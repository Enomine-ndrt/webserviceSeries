<?php
session_start();

ini_set("error_reporting",0);

?>
   <div class="register-box">
       <div class="register-logo">
            <a href="#" class="logo" ><b>Series</b></a>
       </div>
        <div class="register-box-body">
          <p></p>
            <form  action="?c=usuario_controller&a=GuardarDatos" method="POST">

            <div class="form-group has-feedback">
                <input type="text" name="usuario" class="form-control" placeholder="Usuario" required/>
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" name="contrasena" class="form-control" placeholder="contraseña" required/>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
               
            </div>
              
                <div class="col-xs-12">
                    <button type="submit" name="registrar" class="btn btn-primary btn-block btn-flat">Login</button>
                </div>
            </form>
        </div>
   </div>    
