<?php
session_start();


ini_set("error_reporting",0);
?>
<br><br><br><br>
<div class="register-box">
       <div class="register-logo">
            <a href="?c=usuario_controller&a=registrarSerie" class="logo" ><b>Agregar</b> Series</a>
       </div>
        <div class="register-box-body">
          <p></p>
            <form  action="?c=usuario_controller&a=registrarSerie" method="POST">

            <div class="form-group has-feedback">
                <input type="hidden" name="idSerie" class="form-control" placeholder="id" required/>
            </div>
            <div class="form-group has-feedback">
                <strong>Nombre Serie</strong>
                <input type="text" name="nombreSerie" class="form-control" placeholder="nombre" required/>
            </div>
            <div class="form-group has-feedback">
                <strong>Descripcion</strong>
            <textarea name="descripcion" id="" cols="43" rows="6" placeholder="descripcion breve" required></textarea>
            </div>
            <div class="form-group has-feedback">
                <strong>Direccion imagen</strong>
                <input type="text" name="imagenSerie" class="form-control" placeholder="ingrese url de imagen" required/>
            </div> 
                <div class="col-xs-12">
                    <button type="submit" name="registrar" class="btn btn-secondary btn-block btn-flat">Registrar</button>
                </div>
             
            </form>
        </div>
   </div>    

