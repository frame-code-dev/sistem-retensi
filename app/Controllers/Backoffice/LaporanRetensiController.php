<?php

namespace App\Controllers\Backoffice;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class LaporanRetensiController extends BaseController
{
    protected $helpers = ['form','url'];
    protected $validation;
    protected $rekamModel;

    public function __construct(){
        $this->validation = \Config\Services::validation();
        $this->rekamModel = new \App\Models\RekamMedisModel();
    }
    public function index()
    {
        $param['title'] = 'Laporan Retensi Rekam Medis';
        $query = $this->rekamModel->where('status','active');
        if ($this->request->is('post')) {
            $start = $this->request->getVar('start');
            $end = $this->request->getVar('end');
            $query->where('created_at >=', date('Y-m-d', strtotime($start)))
                        ->where('created_at <=', date('Y-m-d', strtotime($end)));
        }
        $param['data'] = $query->findAll();
        return view('backoffice/laporan/laporan-retensi/index',$param);
    }

    public function pdf() {
        $start = $this->request->getVar('start');
        $end = $this->request->getVar('end');
        $param['nama'] = $this->request->getVar('nama');
        $param['nip'] = $this->request->getVar('nip');
        $query = $this->rekamModel->where('status','active');
        if ($this->request->is('post')) {
            $start = $this->request->getVar('start');
            $end = $this->request->getVar('end');
            $query->where('created_at >=', date('Y-m-d', strtotime($start)))
                        ->where('created_at <=', date('Y-m-d', strtotime($end)));
        }
        $param['title'] = 'LAPORAN RETENSI REKAM MEDIS';
        $param['data'] = $query->findAll();
        return view('backoffice/laporan/laporan-retensi/pdf',$param);
    }
}
