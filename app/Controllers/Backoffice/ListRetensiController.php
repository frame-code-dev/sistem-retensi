<?php

namespace App\Controllers\Backoffice;

use App\Controllers\BaseController;
use App\Models\LogActivityModel;
use App\Models\UploadBerkas;
use CodeIgniter\HTTP\ResponseInterface;

class ListRetensiController extends BaseController
{
    private $validation;
    private $rekamModel;
    private $uploadBerkas;
    public function __construct()
    {
        $this->validation = \Config\Services::validation();
        $this->rekamModel = new \App\Models\RekamMedisModel();
        $this->uploadBerkas = new UploadBerkas;
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

        $data_berkas_pemusnahan = [
            'id_rekam_medis' => $id,
            'keterangan' => null,
            'created_at' => date("Y-m-d H:i:s"),
        ];
        $data_berkas_pelestarian = [
            'id_rekam_medis' => $id,
            'keterangan' => null,
            'created_at' => date("Y-m-d H:i:s"),
        ];
        $this->uploadBerkas->insert($data_berkas_pemusnahan);
        $this->uploadBerkas->insert($data_berkas_pelestarian);
        session()->setFlashdata("status_success", true);
        session()->setFlashdata('message', 'Data rekam medis berhasil di-retensi.');
        return redirect()->to('/dashboard/list-retensi');
    }
}
