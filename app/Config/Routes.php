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

$routes->get('/pantallaActualizarTarea/(:num)', 'tarea\Tarea::pantallaActualizarTarea/$1');

$routes->post('/actualizarTarea/(:num)', 'tarea\Tarea::modificarTarea/$1');

$routes->get('/formCrearSubTarea/(:num)', 'subtarea\SubTarea::formularioCreacion/$1');

$routes->post('/crearSubTarea', 'subtarea\SubTarea::crearSubTarea');

$routes->get('/subTarea/(:num)', 'subtarea\SubTarea::pantallaSubTarea/$1');

$routes->post('/eliminarSubTarea/(:num)', 'subtarea\SubTarea::eliminarSubTarea/$1');

$routes->get('/pantallaActualizarSubTarea/(:num)', 'subtarea\SubTarea::pantallaActualizarSubTarea/$1');

$routes->post('/actualizarSubTarea/(:num)', 'subtarea\SubTarea::modificarSubTarea/$1');

$routes->post('/anadirResponsable', 'subtarea\SubTarea::asignarResponsable');