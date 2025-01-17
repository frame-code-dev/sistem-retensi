<?php

use App\Controllers\Backoffice\BAPController;
use App\Controllers\Backoffice\DashboardController;
use App\Controllers\Backoffice\ImportController;
use App\Controllers\Backoffice\LaporanPelestarianController;
use App\Controllers\Backoffice\LaporanPemusnahanController;
use App\Controllers\Backoffice\LaporanRetensiController;
use App\Controllers\Backoffice\ListRetensiController;
use App\Controllers\Backoffice\LogActivityController;
use App\Controllers\Backoffice\PelestarianController;
use App\Controllers\Backoffice\PemusnahanController;
use App\Controllers\Backoffice\PetugasController;
use App\Controllers\Backoffice\RekamMedisController;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index',['filter' => 'login']);

// Dashboard 
$routes->get('/', [DashboardController::class,'index'],['filter' => 'login']);
$routes->group('dashboard',['filter' => 'login'], static function ($routes) {
    // Petugas 
    $routes->get('petugas', [PetugasController::class,'index']);    
    $routes->get('petugas/create', [PetugasController::class,'create']);    
    $routes->post('petugas/store', [PetugasController::class,'store']);    
    $routes->get('petugas/show/(:any)', [PetugasController::class,'show']);    
    $routes->get('petugas/edit/(:any)', [PetugasController::class,'edit']);    
    $routes->post('petugas/edit/update/(:any)', [PetugasController::class,'update']);    
    $routes->post('petugas/update-status', [PetugasController::class,'updateStatus']);    
    $routes->get('petugas/delete/(:any)', [PetugasController::class,'destroy']);    
    $routes->get('petugas/update-password',[PetugasController::class,'updatePassword']);
    $routes->post('petugas/update-password/store',[PetugasController::class,'updatePasswordStore']);

    // Rekam Medis 
    $routes->get('rekam-medis',[RekamMedisController::class,'index']);
    $routes->get('rekam-medis/create',[RekamMedisController::class,'create']);
    $routes->post('rekam-medis/store',[RekamMedisController::class,'store']);
    $routes->get('rekam-medis/edit/(:any)',[RekamMedisController::class,'edit']);
    $routes->post('rekam-medis/edit/update/(:any)',[RekamMedisController::class,'update']);
    $routes->get('rekam-medis/show/(:any)',[RekamMedisController::class,'show']);
    $routes->get('rekam-medis/delete/(:any)', [RekamMedisController::class,'destroy']);    
      // Rekam Medis - import
    $routes->get('rekam-medis/import',[ImportController::class,'index']);
    $routes->post('rekam-medis/import/store',[ImportController::class,'store']);
    // List Retensi 
    $routes->get('list-retensi',[ListRetensiController::class,'index']);
    $routes->post('list-retensi/update',[ListRetensiController::class,'update']);
    // Pemusnahan 
    $routes->get('pemusnahan',[PemusnahanController::class,'index']);
    $routes->get('pemusnahan/upload/(:any)',[PemusnahanController::class,'upload']);
    $routes->post('pemusnahan/upload/store/(:any)',[PemusnahanController::class,'uploadStore']);
    $routes->get('pemusnahan/edit/(:any)',[PemusnahanController::class,'uploadEdit']);
    $routes->post('pemusnahan/edit/update/(:any)',[PemusnahanController::class,'uploadEditStore']);
    $routes->get('pemusnahan/show/(:any)',[PemusnahanController::class,'show']);
    $routes->get('pemusnahan/pdf/(:any)',[PemusnahanController::class,'pdf']);
    // Pelestarian 
    $routes->get('pelestarian',[PelestarianController::class,'index']);
    $routes->get('pelestarian/upload/(:any)',[PelestarianController::class,'upload']);
    $routes->post('pelestarian/upload/store/(:any)',[PelestarianController::class,'uploadStore']);
    $routes->get('pelestarian/edit/(:any)',[PelestarianController::class,'uploadEdit']);
    $routes->post('pelestarian/edit/update/(:any)',[PelestarianController::class,'uploadEditStore']);
    $routes->get('pelestarian/show/(:any)',[PelestarianController::class,'show']);
    $routes->get('pelestarian/pdf/(:any)',[PelestarianController::class,'pdf']);
    // laporan 
    // laporan retensi 
    $routes->get('laporan-retensi',[LaporanRetensiController::class,'index']);
    $routes->get('laporan-retensi/pdf',[LaporanRetensiController::class,'pdf']);
    // laporan pelestarian 
    $routes->get('laporan-pelestarian',[LaporanPelestarianController::class,'index']);
    $routes->get('laporan-pelestarian/pdf',[LaporanPelestarianController::class,'pdf']);
    // laporan pemusnahan
    $routes->get('laporan-pemusnahan',[LaporanPemusnahanController::class,'index']);
    $routes->get('laporan-pemusnahan/pdf',[LaporanPemusnahanController::class,'pdf']);
    // Laporan BAP 
    $routes->get('laporan-bap',[BAPController::class,'index']);
    $routes->post('laporan-bap/store',[BAPController::class,'store']);
    // log activity 
    $routes->get('log-activity',[LogActivityController::class,'index']);
    $routes->get('log-activity/show/(:any)',[LogActivityController::class,'show']);

});