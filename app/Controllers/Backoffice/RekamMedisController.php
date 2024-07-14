<?php

namespace App\Controllers\Backoffice;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class RekamMedisController extends BaseController
{
    protected $rekamModel;

    public function __construct()
    {
        $this->rekamModel = new \App\Models\RekamMedisModel();
    }
    public function index()
    {
        $param['title'] = 'List Rekam Medis';
        $param['data'] = $this->rekamModel->getAllRekamMedis();
        return view('backoffice/rekam-medis/index',$param);
    }
}
