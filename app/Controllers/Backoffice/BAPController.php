<?php

namespace App\Controllers\Backoffice;

use App\Controllers\BaseController;
use App\Models\LogActivityModel;
use App\Models\UploadBerkas;
use CodeIgniter\HTTP\ResponseInterface;
use Myth\Auth\Models\UserModel;

class BAPController extends BaseController
{
    protected $helpers = ['form','url'];
    protected $validation;
    protected $rekamModel;
    protected $uploadBerkas;
    
    public function __construct()
	{
        $this->uploadBerkas = new UploadBerkas();
        $this->validation = \Config\Services::validation();
        $this->rekamModel = new \App\Models\RekamMedisModel();
		
	}
    public function index()
    {
        $param['title'] = 'Laporan BAP';
        return view('backoffice/laporan/laporan-bap/index',$param);
    }

    public function store() {
        $data = $this->request->getPost();
        $query = $this->uploadBerkas->getAllRekamMedisBerkas();
        if ($this->request->is('post')) {
            $start = $this->request->getVar('start');
            $end = $this->request->getVar('end');
            $query->where('rekam_medis.created_at >=', date('Y-m-d', strtotime($start)))
                        ->where('rekam_medis.created_at <=', date('Y-m-d', strtotime($end)));
        }
        $param['data'] = $query->countAllResults();
        $param['title'] = 'LAPORAN BAP';
        $param['nomor'] = $data['nomor'];
        $param['tahun'] = $data['tahun'];
        $param['nama_lengkap_kesatu'] = $data['nama_lengkap_kesatu'];
        $param['nip_kesatu'] = $data['nip_kesatu'];
        $param['pangkat_kesatu'] = $data['pangkat_kesatu'];
        $param['jabatan_kesatu'] = $data['jabatan_kesatu'];
        $param['nama_lengkap_kedua'] = $data['nama_lengkap_kedua'];
        $param['jabatan_kedua'] = $data['jabatan_kedua'];
        $param['alamat_kedua'] = $data['alamat_kedua'];
        $param['hari'] = $data['hari'];
        $param['tanggal'] = $data['tanggal'];
        $param['waktu'] = $data['waktu'];
        $param['lokasi'] = $data['lokasi'];
        $param['ketua_tim'] = $data['ketua_tim'];
        $param['nama_pelaksana'] = $data['nama_pelaksana']; 

        $data = [
            'user_id' => user()->id,
            'action' => 'Cetak BERITA ACARA PEMUSNAHAN ARSIP',
            'ip_address' => $this->request->getUserAgent(),
            'created_at' => date("Y-m-d H:i:s"),
        ];
        $log = new LogActivityModel();
        $log->insertLog($data);
        return view('backoffice/laporan/laporan-bap/pdf',$param);
    }
}
