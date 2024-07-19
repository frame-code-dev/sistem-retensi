<?php

namespace App\Controllers\Backoffice;

use App\Controllers\BaseController;
use App\Models\UploadBerkas;
use CodeIgniter\HTTP\ResponseInterface;

class DashboardController extends BaseController
{
    public $param;
    protected $rekamModel;
    protected $uploadBerkas;

    public function __construct(){
        $this->rekamModel = new \App\Models\RekamMedisModel();
        $this->uploadBerkas = new UploadBerkas();
    }
    public function index()
    {
        $param['title'] = 'Dashboard';
        $param['count_belum_retensi'] = $this->rekamModel->where('status','active')->countAllResults();
        $param['count_sudah_retensi'] = $this->uploadBerkas->getAllRekamMedisBerkas()->where('upload_berkas.keterangan','PELESTARIAN')->countAllResults();
        $param['count_siap_dimusnahkan'] = $this->uploadBerkas->getAllRekamMedisBerkas()->where('upload_berkas.keterangan','PEMUSNAHAN')->countAllResults();
        
        // Fetch the data for the chart
        // Fetch the data for the chart
        $pelestarianData = $this->uploadBerkas->select('DATE(created_at) as date, COUNT(*) as count')
                        ->where('keterangan', 'PELESTARIAN')
                        ->groupBy('DATE(created_at)')
                        ->findAll();
        $pemusnahanData = $this->uploadBerkas->select('DATE(created_at) as date, COUNT(*) as count')
                        ->where('keterangan', 'PEMUSNAHAN')
                        ->groupBy('DATE(created_at)')
                        ->findAll();


        // Format data for the chart
        $chartData = [
            'pelestarian' => [],
            'pemusnahan' => []
        ];

        foreach ($pelestarianData as $data) {
            $chartData['pelestarian'][] = [
                'date' => $data['date'],
                'count' => $data['count']
            ];
        }

        foreach ($pemusnahanData as $data) {
            $chartData['pemusnahan'][] = [
                'date' => $data['date'],
                'count' => $data['count']
            ];
        }

        $param['chartData'] = $chartData;
        return view('dashboard',$param);
    }
}
