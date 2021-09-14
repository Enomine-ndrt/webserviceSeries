<?php
session_start();

ini_set("error_reporting",0);
//require "header.php";

/*
foreach($nom as $nom){
    echo $nom["nombre"]."\n";
    echo $nom["usuario"]."\n";
    echo $nom["contrasena"]."\n";
    echo $nom["nacimiento"]."\n";
    echo $nom["email"]."\n";

}

*/
   // echo $usuario->nombreCom;
   // echo $usuario->email;
    //echo $usuario->usuario;
   // echo $usuario->contrasena;
   // echo $usuario->repiContrasena;


//require "footer.php";

$nombre = $_REQUEST["nombreSerie"];
$capitulo = $_REQUEST["capitulo"];
$descripcion = $_REQUEST["descripcion"];
$imagen = $_REQUEST["imagenSerie"];
$id = $_REQUEST["idSerie"];
$numeroCapitulo = $_REQUEST["numeroCapitulo"];

echo $id."<br>";
echo $nombre."<br>";
echo $capitulo."<br>";
echo $numeroCapitulo;
echo $descripcion."<br>";
echo $imagen."<br>";
//echo $numeroCapitulo;

?>