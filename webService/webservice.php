<?php
require_once("config/config.php");
require_once("utils/utilidades.php");

$service = new utilidades();

    if($_SERVER['REQUEST_METHOD']=='GET'){
       
        if(isset($_GET['id'])){
            $series = $service->seleccionarCapitulos($_GET['id']);
            $j = array();
            foreach($series as $row){
                $nombre = $row["nombre"];    
                $capitulo = $row["capitulo"];
                $id = $row["id"];
                $numeroCapitulo = $row["numeroCapitulo"];
                $imagen      = $row["imagenSerie"];
                
                $j[] = array("nombre"=>$nombre,"capitulo"=>$capitulo,"id"=>$id,"numeroCapitulo"=>$numeroCapitulo,"imagenSerie"=>$imagen);
            }
            header("HTTP/1.1 200 OK");
            $json = json_encode($j);
            echo $json;
            exit();
    
        }else{
            $series = $service->seriesDisponibles();
            $j = array();
            foreach($series as $row){
                    
                $id = $row["id"];
                $nombre = $row["nombre"];
                $descripcion = $row["descripcion"];
                $imagen = $row["imagenSerie"];
                $j[] = array("id"=>$id,"nombre"=>$nombre,"descripcion"=>$descripcion,"imagenSerie"=>$imagen);
            }
            header("HTTP/1.1 200 OK");
            $json = json_encode($j);
            echo $json;
            exit();
    
        }

    }



