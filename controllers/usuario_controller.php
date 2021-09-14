<?php
//llamada al modelo
require_once("models/usuario_modelo.php");

class usuario_controller{
    private $model;  
    
    public function __construct(){
        $this->model = new usuario_modelo(); 
    }

public function mostrarDatos(){
    $usuario = new usuario_modelo();
    $nom = $usuario->seleccionarUsuario();
    require_once("views/datos.php");
}

public function GuardarDatos(){
    $usuario = new usuario_modelo();
    
    $usuario->usuario = $_REQUEST["usuario"];
    $usuario->contrasena = $_REQUEST["contrasena"];
    $usuario->repiContrasena = $_REQUEST["repcontrasena"];
        
  $valido =   $this->model->validarUsuario($usuario);

        if($valido == true  && $valido != null) {
           $dato = $usuario;

            require "views/inicio_plantilla.php";
        }else{
            require "views/plantilla_registro.php";
        }

}

public function registrarSerie(){

$usuario = new usuario_modelo();

//$usuario->idSerie = $_REQUEST["idSerie"];
$usuario->nombreSerie   =  $_REQUEST["nombreSerie"];
$usuario->descripcion = $_REQUEST["descripcion"];
$usuario->imagenSerie = $_REQUEST["imagenSerie"];

$this->model->ingresarSerie($usuario);
require_once("views/inicio_plantilla.php");
}

public function opciones(){
    $u  =  new usuario_controller();
     $registra = $_REQUEST['registra'];
     $modifica = $_REQUEST['modifica'];
     $ver = $_REQUEST['ver'];
    if($registra != null){
        $u->registraCapitulos();
    }
    if($modifica != null){
        $u->modificarSerie();
    }
    if($ver != null){
        $u->verCapitulos();
    }
    
}

public function opcionesIA(){
    $u = new usuario_controller();
    $registro = $_REQUEST['registra'];
    $modifica = $_REQUEST['modifica'];

  if($registro != null){
    $u->registraCapitulo();
  }
  if($modifica != null){
    require_once("views/plantilla_modifica_capitulo.php");

  }

}

public function registraCapitulos(){

    $cap  =  new usuario_modelo();

    $cap->id = $_REQUEST["id"];
  $cap->nombre  = $_REQUEST["nombre"];
    
        require_once("views/plantilla_agregar_capitulo.php");

    
}

public function modificaCapitulo(){
    $cap = new usuario_modelo();
    $cap->nombreSerie = $_REQUEST['nombreSerie'];
    $cap->capitulo = $_REQUEST['capitulo'];
    $cap->numeroCapitulo = $_REQUEST['numeroCapitulo'];
    $cap->idSerie = $_REQUEST['idSerie'];
    $this->model->modificarCapitulos($cap);
    require_once("views/datos.php");
}


public function registraCapitulo(){
    $cap = new usuario_modelo();

if(isset($_REQUEST["idSerie"])){
    $cap->id = $_REQUEST["idSerie"];
    $cap->nombre  = $_REQUEST["nombre"];
   
}
require_once("views/plantilla_registra_capitulo.php");  
}

public function RCAT(){
    $usuario = new usuario_modelo();
    $usuario->nombreSerie = $_REQUEST["nombreSerie"];
    $usuario->capitulo = $_REQUEST["capitulo"];
    $usuario->idSerie = $_REQUEST["idSerie"];
    $usuario->numeroCapitulo = $_REQUEST["numeroCapitulo"];    


    $this->model->registrarCapitulo($usuario);
    require_once("views/plantilla_registra_capitulo.php");

}
public function modificarSerie(){
    $cap = new usuario_modelo();
    $cap->id = $_REQUEST["id"];
   $cap->nombre  = $_REQUEST["nombre"];
   $cap->descripcion = $_REQUEST["descripcion"];
    $cap->imagenSerie = $_REQUEST["imagenSerie"];
    
    
require_once("views/plantilla_modifica_series.php");

}

public function modificaSerie(){

$usuario = new usuario_modelo();

$usuario->id = $_REQUEST["idSerie"];
$usuario->nombreSerie   =  $_REQUEST["nombreSerie"];
$usuario->descripcion = $_REQUEST["descripcion"];
$usuario->imagenSerie = $_REQUEST["imagenSerie"];

$this->model->modificarSerie($usuario);
require_once("views/plantilla_series.php");
}

public function verCapitulos(){
   
    require_once("views/plantilla_ver_capitulos.php");
}

public function regresa(){
   require_once("views/inicio_plantilla.php");
}

public function listaSeries(){
    require_once("views/plantilla_series.php");
}

public function agragarSerie(){
    require_once("views/plantilla_agregar_serie.php"); 
}

    public function index(){
        //llamamos a la vista
              require_once("views/plantilla_registro.php");
    }

 

}



