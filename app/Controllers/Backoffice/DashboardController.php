<?php

namespace App\Controllers\Backoffice;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class DashboardController extends BaseController
{
    public $param;
    public function index()
    {
        $param['title'] = 'Dashboard';
        return view('dashboard',$param);
    }
}
