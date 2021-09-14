<?php
require_once "db/conexion.php";
require_once "controllers/usuario_controller.php";
$controller = "usuario_controller";

if(!isset($_REQUEST["c"])){
    require_once "controllers/$controller.php";
    $controller = ucwords($controller);
    $controller = new $controller;
    $controller->index();  
}else{
    $controller = strtolower($_REQUEST['c']);
    $accion = isset($_REQUEST["a"])? $_REQUEST["a"] : "index";
    require_once "controllers/$controller.php";
    $controller = ucwords($controller);
    $controller = new $controller;
    call_user_func( array( $controller, $accion ) );

}

