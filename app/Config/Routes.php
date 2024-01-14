<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

//Main Web Page
$routes->get('/', 'login::login');
//Post Method for Login User
$routes->post('/login', 'login::login');

$routes->group('', ['filter' => 'AuthUser'],function($routes){
   
}); 
 //Get Method Without Parameter
    $routes->get('/user/list',   'user::index');
    $routes->get('/user/add',    'user::add');
    $routes->get('/confirm_logout',  'logout::confirmLogout');
    $routes->get('/logout' ,    'logout::logout');
    
    //Get Method with parameter for View
    $routes->get('/user/view/(:num)',    'user::view/$1');
    
    //Get Method with parameter for Delete
    $routes->get('/user/delete/(:num)',  'user::delete/$1');
    
    //Get Method with parameter for Edit
    $routes->get('/user/edit/(:num)', 'user::edit/$1');
    
    //Post Method for editing Data
    $routes->post('/user/edit/(:num)', 'user::edit/$1');
    
    //Post Method for Adding data
    $routes->post('/user/add', 'user::add');
    
    //Post method for deleting data
    $routes->post('/user/delete/(:num)', 'user::delete/$1');





