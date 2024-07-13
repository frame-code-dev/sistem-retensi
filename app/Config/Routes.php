<?php

use App\Controllers\Backoffice\DashboardController;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index',['filter' => 'login']);

// Dashboard 
$routes->get('/', [DashboardController::class,'index'],['filter' => 'login']);