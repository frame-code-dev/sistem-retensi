<?php

namespace App\Controllers\Backoffice;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class RekamMedisController extends BaseController
{
    protected $helpers = ['form','url'];
    protected $validation;
    protected $rekamModel;

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
        
    }
}
