<?php
require_once 'Controller/PeliculaController.php';
$controller = new ProductController();
$accion = $_GET['action'] ?? 'index';
switch($accion){
    case 'crear':
        $controller->agregarPelicula();
        break;
        
    case 'editar':
         $controller->editarPelicula();
        break;

    case 'eliminar':
         $controller->eliminarPelicula();
        break;

    default:
    $controller->index();
}
