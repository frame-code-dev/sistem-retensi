<?php

namespace App\Controllers\Backoffice;

use App\Controllers\BaseController;
use App\Models\LogActivityModel;
use App\Models\RekamMedisModel;
use CodeIgniter\HTTP\ResponseInterface;

class RekamMedisController extends BaseController
{
    protected $helpers = ['form','url'];
    protected $validation;
    protected $rekamModel;
    protected $format = 'json';

    public function __construct()
    {
        $this->validation = \Config\Services::validation();
        $this->rekamModel = new \App\Models\RekamMedisModel();
    }
    public function index()
    {
        $param['title'] = 'List Rekam Medis';
        $param['data'] = $this->rekamModel->getAllRekamMedis();
        return view('backoffice/rekam-medis/index',$param);
    }

    public function create() {
        $param['title'] = 'Create Rekam Medis';
        return view('backoffice/rekam-medis/create',$param);
    }

    public function store() {
        $validate = [
            'nik_pasien' => 'required|alpha_numeric_space|min_length[16]|max_length[16]|is_unique[rekam_medis.nik_pasien]',
            'no_rm' => 'required|numeric|is_unique[rekam_medis.no_rm]|alpha_numeric_space|min_length[6]|max_length[6]',
            'nama_pasien' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'tanggal_kunjungan_terakhir' => 'required',
            'alamat' => 'required',
            'diagnosa' => 'required',
            'jenis_kelamin' => 'required',
            'dpjp' => 'required',
        ];

        if (!$this->validate($validate)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        try {
            $no_rm = $this->request->getPost("no_rm");
            $nik_pasien = $this->request->getPost('nik_pasien');
            $nama_pasien = $this->request->getPost('nama_pasien');
            $tempat_lahir = $this->request->getPost('tempat_lahir');
            $alamat = $this->request->getPost('alamat');
            $diagnosa = $this->request->getPost('diagnosa');
            $tanggal_lahir = $this->request->getPost('tanggal_lahir') ? $this->request->getPost('tanggal_lahir') : date('Y-m-d');
            $tanggal_kunjungan_terakhir = $this->request->getPost('tanggal_kunjungan_terakhir') ? $this->request->getPost('tanggal_kunjungan_terakhir') : date('Y-m-d');
            $jenis_kelamin = $this->request->getPost('jenis_kelamin');
            $dpjp = $this->request->getPost('dpjp');

            $tgl_lahir = date('Y-m-d', strtotime($tanggal_lahir));

            // Mendapatkan tanggal kunjungan terakhir dan tanggal saat ini
            $start_date = date_create(date('Y-m-d', strtotime($tanggal_kunjungan_terakhir)));
            $end_date = date_create(date('Y-m-d'));

            // Menghitung selisih tahun antara tanggal kunjungan terakhir dan tanggal saat ini
            $interval = date_diff($start_date, $end_date);
            $status = $interval->y >= 5 ? 'inactive' : 'active';

            // Menambahkan 5 tahun ke tanggal kunjungan terakhir
            $start_date->modify('+5 years');
            // Format tanggal dalam format 'Y-m-d'
            $date_5_years_later  = $start_date->format('Y-m-d');

            // Menambahkan 2 tahun lagi ke tanggal setelah penambahan 5 tahun
            $start_date->modify('+2 years');
            $date_7_years_later = $start_date->format('Y-m-d');

            $data = [
                'no_rm' => $no_rm,
                'nama_pasien' => $nama_pasien,
                'tempat_lahir' => $tempat_lahir,
                'tanggal_lahir' => $tgl_lahir,
                'nik_pasien' => $nik_pasien,
                'jenis_kelamin' => $jenis_kelamin == 'l' ? 'L' : 'P',
                'alamat_lengkap' => $alamat,
                'diagnosa' => $diagnosa,
                'dpjp' => $dpjp,
                'status' => $status,
                'tanggal_kunjungan_terakhir' =>  date('Y-m-d H:i:s', strtotime($tanggal_kunjungan_terakhir)),
                'tanggal_retensi' => $date_5_years_later,
                'tanggal_pemusnahan' => $date_7_years_later,
                'created_at' => date('Y-m-d H:i:s'),
            ];

            $this->rekamModel->insert($data);
            $data = [
                'user_id' => user()->id,
                'action' => 'Menambahkan data pasien',
                'ip_address' => $this->request->getUserAgent(),
                'created_at' => date("Y-m-d H:i:s"),
            ];
            $log = new LogActivityModel();
            $log->insertLog($data);
            session()->setFlashdata("status_success", true);
            session()->setFlashdata('message', 'Data rekam medis berhasil ditambahkan.');
            return redirect()->to('dashboard/rekam-medis');
        } catch ( \Throwable $e) {
            session()->setFlashdata("status_error", true);
			session()->setFlashdata('error', 'Data rekam medis gagal ditambahkan, <br>' . $e->getMessage());
			return redirect()->back();
    
        } catch (\Exception $e) {
            session()->setFlashdata("status_error", true);
			session()->setFlashdata('error', 'Data rekam medis gagal ditambahkan, <br>' . $e->getMessage());
			return redirect()->back();
        }
    }

    public function show($id) {
        $param['title'] = 'Detail Rekam Medis';
        $param['data'] = $this->rekamModel->where('id',$id)->first();
        return view('backoffice/rekam-medis/show',$param);
    }

    public function edit($id) {
        $param['title'] = 'Edit Rekam Medis';
        $param['data'] = $this->rekamModel->find($id);
        return view('backoffice/rekam-medis/edit',$param);
    }
    
    public function update($id) {
        $validate = [
            'nik_pasien' => 'required|alpha_numeric_space|min_length[16]|max_length[16]',
            'nama_pasien' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'alamat' => 'required',
            'diagnosa' => 'required',
            'jenis_kelamin' => 'required',
            'dpjp' => 'required',
        ];

        if (!$this->validate($validate)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        try {
            $nik_pasien = $this->request->getPost('nik_pasien');
            $nama_pasien = $this->request->getPost('nama_pasien');
            $tempat_lahir = $this->request->getPost('tempat_lahir');
            $alamat = $this->request->getPost('alamat');
            $diagnosa = $this->request->getPost('diagnosa');
            $tanggal_lahir = $this->request->getPost('tanggal_lahir') ? $this->request->getPost('tanggal_lahir') : date('Y-m-d');
            $jenis_kelamin = $this->request->getPost('jenis_kelamin');
            $dpjp = $this->request->getPost('dpjp');

            $tgl_lahir = date('Y-m-d', strtotime($tanggal_lahir));

            $data = [
                'nama_pasien' => $nama_pasien,
                'tempat_lahir' => $tempat_lahir,
                'tanggal_lahir' => $tgl_lahir,
                'nik_pasien' => $nik_pasien,
                'jenis_kelamin' => $jenis_kelamin == 'l' ? 'L' : 'P',
                'alamat_lengkap' => $alamat,
                'diagnosa' => $diagnosa,
                'dpjp' => $dpjp,
                'created_at' => date('Y-m-d H:i:s'),
            ];
            $this->rekamModel->update($id,$data);
            $data = [
                'user_id' => user()->id,
                'action' => 'Mengganti data pasien',
                'ip_address' => $this->request->getUserAgent(),
                'created_at' => date("Y-m-d H:i:s"),
            ];
            $log = new LogActivityModel();
            $log->insertLog($data);
            session()->setFlashdata("status_success", true);
            session()->setFlashdata('message', 'Data rekam medis berhasil ditambahkan.');
            return redirect()->to('dashboard/rekam-medis');
        } catch ( \Throwable $e) {
            return $e->getMessage();
            session()->setFlashdata("status_error", true);
			session()->setFlashdata('error', 'Data rekam medis gagal ditambahkan, <br>' . $e->getMessage());
			return redirect()->back();
    
        } catch (\Exception $e) {
            return $e->getMessage();
            session()->setFlashdata("status_error", true);
			session()->setFlashdata('error', 'Data rekam medis gagal ditambahkan, <br>' . $e->getMessage());
			return redirect()->back();
        }


    }
    public function destroy($id) {
        $data = $this->rekamModel->find($id);
        if ($data) {
            $this->rekamModel->delete($id);
        }
        session()->setFlashdata("status_success", true);
        session()->setFlashdata('message', 'Data rekam medis berhasil dihapus.');
        $this->rekamModel->update($id,$data);
        $data = [
            'user_id' => user()->id,
            'action' => 'Menghapus data pasien',
            'ip_address' => $this->request->getUserAgent(),
            'created_at' => date("Y-m-d H:i:s"),
        ];
        $log = new LogActivityModel();
        $log->insertLog($data);
        return redirect()->to('dashboard/rekam-medis');
    }
}
