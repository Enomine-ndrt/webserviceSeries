<?php
    require_once "lib/config.php";

class conexion extends PDO{

private $tipo_base = tb;
private $dbhost = host;
private $db_name = db;
private $usuario = dbuser;
private $contrasena = dbpwd;

    function __construct()
 {
       
  try{
    parent::__construct("{$this->tipo_base}:dbname={$this->db_name};host={$this->dbhost};",$this->usuario,$this->contrasena);
  }catch(PDOException  $e){
        echo "ha ocurrido un error".$e;
        exit;
  }
   
 }


}