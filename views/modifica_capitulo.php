<?php

require_once("models/usuario_modelo.php");
ini_set("error_reporting",0);
$id = $_REQUEST['idSerie'];
$nombreSerie = $_REQUEST['nombre'];
$capitulo = $_REQUEST['capitulo'];
$numeroCapitulo = $_REQUEST['numeroCapitulo'];




?>
 <div class="register-box">
       <div class="register-logo">
            <a href="" class="logo" ><b>Modifica</b> Capitulo</a>
       </div>
        <div class="register-box-body">
          <p></p>
            <form  action="?c=usuario_controller&a=modificaCapitulo" method="POST">

         
            <div class="form-group has-feedback">
              <strong>Nombre Serie</strong>
                <input type="text" name="nombreSerie" class="form-control" placeholder="nombre serie" required  value="<?php echo $nombreSerie; ?>"/>
              
            </div>
            <div class="form-group has-feedback">
            <strong>Capitulo</strong>
                <input type="text" name="capitulo" class="form-control" placeholder="capitulo" value="<?php echo $capitulo;?>" required/>
              
            </div>
            <div class="form-group has-feedback">
            
                <input type="hidden" id="idSerie" name="idSerie" class="form-control" placeholder="id serie" required  value="<?php echo $id; ?>" />
                
            </div>
            <div class="form-group has-feedback">
                <strong>Numero capitulo</strong>
                <input type="text" name="numeroCapitulo" class="form-control" placeholder="numero de capitulo"  value="<?php echo $numeroCapitulo;?>" required/>
                
            </div>
           
              
                <div class="col-xs-12">
                    <button type="submit" name="registrar" class="btn btn-secondary btn-block btn-flat">Editar</button>
                </div>
            </form>
        </div>
   </div>    
<?php // echo $id; ?>




