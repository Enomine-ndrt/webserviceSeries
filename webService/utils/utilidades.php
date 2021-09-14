<?php
require_once("db/Conexion.php");
$con;
class utilidades{


    public function __construct()
    {
     $this->con = new Conexion();   
    }


public function seriesDisponibles(){
    try{
        $sql = "SELECT * FROM series";
        $consulta = $this->con->prepare($sql);
        $consulta->execute();
        $registros = $consulta->fetchAll();
        foreach($registros as $row){
         $this->series[] = $row; 
        }
        return $this->series;

    }catch(Exception $e){
        echo "error al seleccionar tabla series ".$e;
    }
}

public function seleccionarCapitulos($id){
    $statemet = "SELECT series.id,series.nombre,series.imagenSerie,serieList.capitulo,serieList.numeroCapitulo 
    FROM series INNER JOIN serieList ON series.id = serieList.id WHERE series.id = :id ORDER BY serieList.numeroCapitulo ASC";
    $consulta = $this->con->prepare($statemet);
    $consulta->bindParam(":id", $id);
    $consulta->execute();
    $registros = $consulta->fetchAll();
     foreach($registros as $row){
      $this->usuarios[] = $row; 
     
    }
    return $this->usuarios;   
}


}




