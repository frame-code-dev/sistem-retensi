<?php

namespace App\Controllers\Backoffice;

use App\Controllers\BaseController;
use App\Models\LogActivityModel;
use App\Models\RekamMedisModel;
use CodeIgniter\HTTP\ResponseInterface;
use DateTime;

class ImportController extends BaseController
{
    public function index()
    {
        $param['title'] = 'Import Data Rekam Medis';
        return view('backoffice/rekam-medis/import/index',$param);
    }

    public function store() {
        $data = $this->request->getPost('data'); 
        $result = json_decode($data, true);
        $current_data = new RekamMedisModel();
        $save = new RekamMedisModel();
        try {
            foreach ($result as $row) {
                // Check for duplicates
                $existing = $current_data->where('no_rm', $row['No. RM'])->first();
                
                // Count years
                $start_date = new DateTime($row['Tanggal Kunjungan Terakhir']);
                $end_date = new DateTime();
                $interval = $start_date->diff($end_date);
                $years_count = $interval->y;
                $status = $years_count >= 5 ? 'inactive' : 'active';
                // tanggal retensi 
                // Add 5 years to the date
                $start_date->modify('+5 years');
                // Format the date in a specific format, e.g., 'Y-m-d'
                $date_5_years_later  = $start_date->format('Y-m-d');
                // 2  tahun berikutnya 
                $start_date = $start_date->modify('+2 years');
                $date_7_years_later = $start_date->format('Y-m-d');
               
                // tanggal lahir 
                $tgl_lahir = date('Y-m-d', strtotime($row['Tanggal Lahir']));
                if (!$existing) {
                    $data = [
                        'no_rm' => (int) $row['No. RM'],
                        'nama_pasien' => $row['Nama Pasien'],
                        'tempat_lahir' => $row['Tempat Lahir'],  
                        'tanggal_lahir' => $tgl_lahir,  
                        'nik_pasien' => $row['NIK Pasien'],
                        'jenis_kelamin' => $row['Jenis Kelamin'] == 'Perempuan' || $row['Jenis Kelamin'] == 'F' ? 'P' : 'L',
                        'alamat_lengkap' => $row['Alamat Lengkap'],
                        'diagnosa' => $row['Diagnosa'],
                        'dpjp' => $row['DPJP'],
                        'status' => $status,
                        'tanggal_kunjungan_terakhir' => date('Y-m-d H:i:s', strtotime($row['Tanggal Kunjungan Terakhir'])),
                        'tanggal_retensi' => $date_5_years_later,
                        'tanggal_pemusnahan' => $date_7_years_later,
                        'created_at' => date('Y-m-d H:i:s'),
                    ];
                    $save->save($data);
                }
            }
            $data = [
                'user_id' => user()->id,
                'action' => 'Menambahkan import data pasien',
                'ip_address' => $this->request->getUserAgent(),
                'created_at' => date("Y-m-d H:i:s"),
            ];
            $log = new LogActivityModel();
            $log->insertLog($data);
            session()->setFlashdata("status_success", true);
			session()->setFlashdata('message', 'Data Pasien berhasil ditambahkan.');
			return redirect()->to('dashboard/rekam-medis');
        } catch (\Throwable $th) {
			session()->setFlashdata("status_error", true);
			session()->setFlashdata('error', 'Data user gagal ditambahkan, <br>' . $th->getMessage());
			return redirect()->back();
		} catch (\Exception $e) {
			session()->setFlashdata("status_error", true);
			session()->setFlashdata('error', 'Data user gagal ditambahkan, <br>' . $e->getMessage());
			return redirect()->back();
		}
    }
}
