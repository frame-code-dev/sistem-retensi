<?php

namespace App\Controllers\Backoffice;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class PemusnahanController extends BaseController
{
    protected $rekamModel;
    public function __construct(){
        $this->rekamModel = new \App\Models\RekamMedisModel();
    }
    public function index()
    {
        $param['title'] = 'Data Restore Pemusnahan';
        $param['data'] = $this->rekamModel->where('deleted_at IS NOT NULL')->findAll();
        return view('backoffice/pemusnahan/index',$param);
    }
}
