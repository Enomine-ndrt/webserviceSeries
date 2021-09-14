<?php
require_once("models/usuario_modelo.php");
ini_set("error_reporting",0);
$id = $_REQUEST['id'];
$nombreSerie = $_REQUEST['nombre'];
$numeroCapitulo  = $_REQUEST['numeroCapitulo'];

$capi = new usuario_modelo();

//if($numeroCapitulo == null){
  //  $numeroCapitulo = 1;
//}


?>
 <div class="register-box">
       <div class="register-logo">
            <a href="" class="logo" ><b>Agrega</b> Capitulo</a>
       </div>
        <div class="register-box-body">
          <p></p>
            <form  action="?c=usuario_controller&a=RCAT" method="POST">

            <div class="form-group has-feedback">
                <strong>Nombre serie</strong>
                <input type="text" name="nombreSerie" class="form-control" placeholder="nombre serie" required  value="<?php echo $nombreSerie ?>"/>
              
            </div>
            <div class="form-group has-feedback">
                <strong>Capitulo</strong>
                <input type="text" name="capitulo" class="form-control" placeholder="capitulo" required/>
              
            </div>
            <div class="form-group has-feedback">
            
                <input type="hidden" name="idSerie" class="form-control" placeholder="id serie" required  value="<?php echo $id; ?>" />
                
            </div>
            <div class="form-group has-feedback">
                <strong>Numero Capitulo</strong>
                <input type="text" readonly="readonly" name="numeroCapitulo" class="form-control" placeholder="numero de capitulo" value="<?php echo $numeroCapitulo+1; ?>" required/>
                
            </div>
           
              
                <div class="col-xs-12">
                    <button type="submit" name="registrar" class="btn btn-secondary btn-block btn-flat">Registrar</button>
                </div>
            </form>
        </div>
   </div>    
<?php // echo $id; ?>

