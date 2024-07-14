<?php

namespace App\Controllers\Backoffice;

use App\Controllers\BaseController;
use App\Models\LogActivityModel;
use CodeIgniter\HTTP\ResponseInterface;

class LogActivityController extends BaseController
{
    public function index()
    {
        $log = new LogActivityModel();
        $param['title'] = 'List Log Activity';
        $param['data'] = $log->getAllLog();
        return view('backoffice/log/index', $param);
    }

    public function show($id) {
        $log = new LogActivityModel();
        $param['title'] = 'Detail Log Activity';
        $param['data'] = $log->getFindLog($id);
        return view('backoffice/log/show', $param);
    }
}
