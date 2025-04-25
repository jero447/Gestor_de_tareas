<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('/iniciar_sesion', 'login\IniciarSesion::login');

$routes->get('/registrar', 'login\IniciarSesion::registrar');

$routes->post('/crearUsuario', 'login\IniciarSesion::insertar');

$routes->post('/loguearUsuario', 'login\IniciarSesion::iniciarSesion');

$routes->get('/cerrarSesion', 'login\IniciarSesion::cerrarSesion');

$routes->get('/miCuenta', 'MiCuenta::miCuenta');

$routes->get('/formCrearTarea', 'tarea\Tarea::formularioCreacion');

$routes->post('/crearTarea', 'tarea\Tarea::crearTarea');

$routes->get('/pantallaTarea/(:num)', 'tarea\Tarea::pantallaTarea/$1');

$routes->post('/eliminarTarea/(:num)', 'tarea\Tarea::eliminarTarea/$1');