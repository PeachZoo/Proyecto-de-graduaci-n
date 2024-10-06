<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
//Rutas para todo lo que tiene que ver con Usuario
$routes->get('/', 'UsuarioController::index');
$routes->get('cuenta', 'UsuarioController::registro');
$routes->post('loguear', 'UsuarioController::login');
$routes->post('guardar','UsuarioController::create');
$routes->get('salir', 'UsuarioController::salir');

//Todas las rutas para lo que tiene que ver con productos
$routes->get('productos', 'ProductoController::index');
$routes->get('playeras', 'ProductoController::playera');
$routes->get('gorras', 'ProductoController::gorra');
$routes->get('paraguas', 'ProductoController::paragua');
$routes->get('pachones', 'ProductoController::pachon');
$routes->get('tazas', 'ProductoController::taza');
$routes->get('formProducto', 'ProductoController::formulario');
$routes->post('cargarProducto', 'ProductoController::store');

//Rutas para todo lo que tiene que ver con clientes
$routes->get('clientes', 'ClienteController::index');
$routes->get('clientes', 'ClienteController::index');
$routes->get('formCliente', 'ClienteController::formulario');
$routes->post('cargarCliente', 'ClienteController::store');
$routes->get('editarCliente/(:any)','ClienteController::edit/$1');
$routes->post('guardarCliente','ClienteController::save');
$routes->get('/eliminarCliente/(:any)','ClienteController::delete/$1');
//Rutas para todo lo que tiene que ver con figuras
$routes->get('figuras', 'FiguraController::index');
$routes->get('formFigura', 'FiguraController::formulario');
$routes->post('cargarFigura', 'FiguraController::store');



//Rutas para todo lo que tiene que ver con diseño
$routes->get('desing', 'DiseñoController::index');
$routes->get('guardarimagen', 'DiseñoController::guardarImagen');