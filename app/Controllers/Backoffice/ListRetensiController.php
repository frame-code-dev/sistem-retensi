<?php

namespace App\Controllers\Backoffice;

use App\Controllers\BaseController;
use App\Models\LogActivityModel;
use CodeIgniter\HTTP\ResponseInterface;

class ListRetensiController extends BaseController
{
    private $validation;
    private $rekamModel;
    public function __construct()
    {
        $this->validation = \Config\Services::validation();
        $this->rekamModel = new \App\Models\RekamMedisModel();
    }

    public function index()
    {
        $param['title'] = 'List Retensi Rekam Medis';
        $param['data'] = $this->rekamModel->findAll();
        return view('backoffice/retensi/index',$param);
    }

    public function update() {
        $id = $this->request->getVar('id');
        $this->rekamModel->update($id,[
            'deleted_at' => date('Y-m-d H:i:s'),
        ]);
        $data = [
            'user_id' => user()->id,
            'action' => 'Pemusnahan Data Rekam Medis',
            'ip_address' => $this->request->getUserAgent(),
            'created_at' => date("Y-m-d H:i:s"),
        ];
        $log = new LogActivityModel();
        $log->insertLog($data);
        session()->setFlashdata("status_success", true);
        session()->setFlashdata('message', 'Data rekam medis berhasil di-retensi.');
        return redirect()->to('/dashboard/list-retensi');
    }
}
