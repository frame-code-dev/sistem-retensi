<?php

namespace App\Controllers\Backoffice;

use App\Controllers\BaseController;
use App\Models\UploadBerkas;
use CodeIgniter\HTTP\ResponseInterface;

class LaporanPemusnahanController extends BaseController
{
    protected $helpers = ['form','url'];
    protected $validation;
    protected $rekamModel;
    protected $uploadBerkas;
    
    public function __construct(){
        $this->uploadBerkas = new UploadBerkas();
        $this->validation = \Config\Services::validation();
        $this->rekamModel = new \App\Models\RekamMedisModel();
    }
    
    public function index()
    {
        $param['title'] = 'LAPORAN PEMUSNAHAN';
        $query = $this->uploadBerkas->getAllRekamMedisBerkas();
        if ($this->request->is('post')) {
            $start = $this->request->getVar('start');
            $end = $this->request->getVar('end');
            $query->where('rekam_medis.created_at >=', date('Y-m-d', strtotime($start)))
                        ->where('rekam_medis.created_at <=', date('Y-m-d', strtotime($end)));
        }
        $param['data'] = $query->findAll();
        return view('backoffice/laporan/laporan-pemusnahan/index',$param);
    }

    public function pdf() {
        $start = $this->request->getVar('start');
        $end = $this->request->getVar('end');
        $param['nama'] = $this->request->getVar('nama');
        $param['nip'] = $this->request->getVar('nip');
        $query = $this->uploadBerkas->getAllRekamMedisBerkas();
        if ($this->request->is('post')) {
            $start = $this->request->getVar('start');
            $end = $this->request->getVar('end');
            $query->where('rekam_medis.created_at >=', date('Y-m-d', strtotime($start)))
                        ->where('rekam_medis.created_at <=', date('Y-m-d', strtotime($end)));
        }
        $param['title'] = 'LAPORAN PEMUSNAHAN';
        $param['data'] = $query->findAll();
        return view('backoffice/laporan/laporan-pemusnahan/pdf',$param);
    }
}
