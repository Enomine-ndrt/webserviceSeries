<?php
require_once("models/usuario_modelo.php");
ini_set("error_reporting",0);
$id = $_REQUEST['id'];
$nombreSerie = $_REQUEST['nombre'];
//$descripcion = $_REQUEST['descripcion'];
//$imagen = $_REQUEST['imagenSerie'];
//$capi = new usuario_modelo();

$serie = new usuario_modelo();
$s = $serie->seleccionaSerie($id);
$descripcion = "";
$titulo ="";
$imagen ="";
$idserie = "";
foreach($s as $row){
$idserie = $row['id'];
$titulo = $row['nombre'];   
$descripcion = $row['descripcion'];
$imagen = $row['imagenSerie'];
}

?>
 <div class="register-box">
       <div class="register-logo">
            <div  class="logo" ><b>Modifica</b>Serie</div>
       </div>
        <div class="register-box-body">
          <p></p>
            <form  action="?c=usuario_controller&a=modificaSerie" method="POST">

            <div class="form-group has-feedback">
            <strong>Nombre serie</strong>
                <input type="text" name="nombreSerie" class="form-control" placeholder="nombre serie" required  value="<?php echo $titulo ?>"/>
              
            </div>
            <div class="form-group has-feedback">
                <strong>Descripcion</strong>
                <textarea name="descripcion" id="" cols="43" rows="6" placeholder="descripcion "  required><?php echo $descripcion ?> </textarea>
              
            </div>
           
            <div class="form-group has-feedback">
            <strong>Direccion de imagen</strong>
                <input type="text" name="imagenSerie" class="form-control" placeholder="imagen" value="<?php echo $imagen; ?>"  required/>
                
            </div>
           
              
                <div class="col-xs-12">

            <input type=hidden  name="idSerie" value=<?php echo $idserie; ?> >
                    <button type="submit" name="registrar" class="btn btn-secondary btn-block btn-flat">Modificar</button>
                </div>
            </form>
        </div>
   </div>    
<?php 

//echo $descripcion; ?>