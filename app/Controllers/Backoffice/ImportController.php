<?php

namespace App\Controllers\Backoffice;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class ImportController extends BaseController
{
    public function index()
    {
        $param['title'] = 'Import Data Rekam Medis';
        return view('backoffice/rekam-medis/import/index',$param);
    }
}
