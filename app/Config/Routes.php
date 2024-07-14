<?php

use App\Controllers\Backoffice\DashboardController;
use App\Controllers\Backoffice\ImportController;
use App\Controllers\Backoffice\LogActivityController;
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
    // Rekam Medis 
    $routes->get('rekam-medis',[RekamMedisController::class,'index']);
    $routes->get('rekam-medis/create',[RekamMedisController::class,'create']);
    $routes->post('rekam-medis/store',[RekamMedisController::class,'store']);
      // Rekam Medis - import
    $routes->get('rekam-medis/import',[ImportController::class,'index']);
    // log activity 
    $routes->get('log-activity',[LogActivityController::class,'index']);
    $routes->get('log-activity/show/(:any)',[LogActivityController::class,'show']);

});