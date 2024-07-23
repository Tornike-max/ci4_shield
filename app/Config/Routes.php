<?php

use App\Controllers\Admin\AdminController;
use App\Controllers\Seller\SellerController;
use App\Controllers\StudentController;
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');


$routes->group('students', function ($routes) {
    $routes->get('/', [StudentController::class, 'index']);
    $routes->get('create', [StudentController::class, 'create']);
    $routes->post('store', [StudentController::class, 'store']);

    $routes->get('edit/(:segment)', [StudentController::class, 'edit']);
    $routes->put('update/(:segment)', [StudentController::class, 'update']);
    $routes->delete('destroy/(:segment)', [StudentController::class, 'destroy']);
});


// $routes->get('method-1', 'Site::method1');
// $routes->get('method-2', 'Site::method2', [
//     'filter' => 'filterAuth'
// ]);
// $routes->get('method-3', 'Site::method3');

// $routes->get('login', 'Site::login');
// $routes->get('not-found', 'Site::notFound');
