<?php
class usuario_modelo {
    public $nombreCom;
    public $email;
    public $usuario;
    public $contrasena;
    public $repiContrasena;
    private  $con;
    private $usuarios;
    private $series;

    public $nombre;
    public $capitulo;
    public $id;
    public $idSerie;
    public $numeroCapitulo;
    public $imagenSerie;
    public $nombreSerie;
    public $descripcion;
    
    public function __construct()
    
    {
        $this->con = new conexion();
        $this->usuarios=array();
    }
  
    public function validarUsuario($data){
        try{
            $sql = "SELECT * FROM usuarios where usuario = ? AND  pass = ? ";
            $consulta = $this->con->prepare($sql);
            $consulta->execute(
                array($data->usuario,$data->contrasena)
            );
            $count = $consulta->rowCount();
            $data = $consulta->fetch(PDO::FETCH_OBJ);
           
            if($count){
               return true;
                
            }else{
                return false;
            }

        }catch(Exception $e){

        }
    }
    

public function seriesDisponibles(){
    try{
        $sql = "SELECT * FROM series";
        $consulta = $this->con->prepare($sql);
        $consulta->execute();
        $registros = $consulta->fetchAll(PDO::FETCH_ASSOC);
        foreach($registros as $row){
         $this->series[] = $row; 
        }
        return $this->series;

    }catch(Exception $e){
        echo "error al seleccionar tabla series ".$e;
    }
}

public function seleccionaSerie($id){
    try{
        $sql = "SELECT * FROM series WHERE id = :id ";
        $consulta = $this->con->prepare($sql);
        $consulta->bindParam(":id", $id);
        $consulta->execute();
        $registros = $consulta->fetchAll(PDO::FETCH_ASSOC);
         foreach($registros as $row){
          $this->series[] = $row; 
         
        }
        return $this->series;   
    }catch(Exception $e){
        echo "error al seleccionar tabla series ".$e;
    }
}

public function registrarCapitulo($data){
    try{
        $sql = "INSERT INTO serieList(nombre,capitulo,id,numeroCapitulo)VALUES(?,?,?,?)";
        $consulta = $this->con->prepare($sql);
        $consulta->execute(
            array($data->nombreSerie,$data->capitulo,$data->idSerie,$data->numeroCapitulo)
        );
        
    }catch(Exception $e){
        echo "ha ocurrido un error al ingresar datos".$e;
    }
}

public function ingresarSerie($data){

    try{
        $sql = "INSERT INTO series(nombre,descripcion,imagenSerie)VALUES(?,?,?)";
        $consulta = $this->con->prepare($sql);
        $consulta->execute(
            array($data->nombreSerie,$data->descripcion,$data->imagenSerie)
        );
        
    }catch(Exception $e){
        echo "ha ocurrido un error al ingresar datos".$e;
    }
}

    
    public function ingresarUsuario(usuario_modelo $data){
        try{
            $sql = "INSERT INTO redsocial(nombre,usuario,contrasena,nacimiento,avatar,email,sexo)VALUES(?,?,?,?,?,?,?)";
            $consulta = $this->con->prepare($sql);
            $consulta->execute(
                array($data->nombre,$data->usuario,$data->contrasena,$data->nacimiento,$data->avatar,$data->email,$data->sexo)
            );
            
        }catch(Exception $e){
            echo "se ha ocurrido un error al ingresar datos".$e;
        }
    }
    
    public function seleccionarUsuario(){
        $statemet = "select id,usuario from usuarios";
        $consulta = $this->con->prepare($statemet);
        $consulta->execute();
        $registros = $consulta->fetchAll();
         foreach($registros as $row){
          $this->usuarios[] = $row;      
        }
        return $this->usuarios;
    }

    public function ingresaCapitulo($data){
        try{
            $sql = "INSERT INTO serieList(nombre,capitulo,id,numeroCapitulo)VALUES(?,?,?,?)";
            $consulta = $this->con->prepare($sql);
            $consulta->execute(
                array($data->nombreSerie,$data->capitulo,$data->contrasena,$data->idSerie,$data->numeroCapitulo)
            );
            
        }catch(Exception $e){
            echo "se ha ocurrido un error al ingresar datos".$e;
        }
    }



    public function seleccionarCapitulos($id){
        $statemet = "SELECT series.id,series.nombre,series.descripcion,series.imagenSerie,serieList.capitulo,serieList.numeroCapitulo 
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

    public function modificarCapitulos($data){

        try{
            $sql = "UPDATE serieList SET nombre = ? , capitulo = ?  WHERE id = ?  AND numeroCapitulo =  ? ";
            $consulta = $this->con->prepare($sql);
            $consulta->execute(array($data->nombreSerie,$data->capitulo,$data->numeroCapitulo,$data->idSerie));
                if($consulta->rowCount() > 0){

                }else{
                    echo "no se pudo actualizar";
                }
        }catch(Exception $e){
            echo "ha ocurrido un error al actualizar capitulo ".$e;
        }
    }

    public function capitulo($data){
      $statemet = "SELECT capitulo FROM serieList WHERE id = ? AND numeroCapitulo = ? ";
      $consulta = $this->con->prepare($statemet);
      $consulta->execute(
          array($data->id,$data->numeroCapitulo));
          $registros = $consulta->fetchAll();
          foreach($registros as $row){
           $this->usuarios[] = $row; 
          
         }
         return $this->usuarios;   

    }


    public function modificarSerie($data){
        try {
            $sql = "UPDATE series SET nombre = ? , descripcion = ? , imagenSerie = ? WHERE id = ? ";
            $consulta = $this->con->prepare($sql);
            $consulta->execute(
                array($data->nombreSerie,$data->descripcion,$data->imagenSerie,$data->id)
            );
                if($consulta->rowCount() > 0){
                      //  echo "actualizado";
                }else{
                   // echo "no se pudo actualizar ";
                    
                //print_r($consulta->errorInfo());
                }

        }catch(Exception $e){
            echo "Ocurrio un Error al modificar serie ".$e;
        }
    }

}

