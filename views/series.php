<?php

require_once("models/usuario_modelo.php");

$series = new usuario_modelo();
 $s = $series->seriesDisponibles();


session_start();

?>
<style>
.boton{
    color: black;
}
</style>

<br><br><br><br>
<table class="table table-bordered table-dark">
  <thead>
    <tr>
     
      <th scope="col">Nombre</th>
      <th scope="col"><center>Descripcion</center></th>
      <th scope="col">Imagen serie</th>
      <th scope="col" >registrar</th>
      <th scope="col">Editar</th>
      <th  scope="col">ver capitulos</th>
    </tr>
  </thead>
  <tbody>
      <?php


    foreach($s as $row){
        $idSerie = $row['id'];
        $nombre = $row['nombre'];
        $descripcion = $row['descripcion'];
        $imagenSerie = $row['imagenSerie'];
        echo '  
        <form method=POST  action=?c=usuario_controller&a=opciones > 
        <tr>
          <input type=hidden  name="id" value='.$idSerie.' >
          <input type=hidden  name="nombre" value='.$row['nombre'].' >
          <input type=hidden  name="descripcion" value='.$row['descripcion'].' >
          <input type=hidden  name="imagenSerie" value='.$imagenSerie.' >
          <td><strong><h4>'.$row['nombre'].'</h4></strong></td>
          <td><strong>'.$row['descripcion'].'</strong></td>
          <td><img  src='.$row['imagenSerie'].'  width="150" height="120" ></td>
          <td><input type=submit  class="btn btn-secondary btn-block btn-flat" name=registra  id=registra value=registra ></td>
          <td><input type=submit class="btn btn-secondary btn-block btn-flat" name=modifica  id=modifica value=modifica ></td>
          <td><input type=submit class="btn btn-secondary btn-block btn-flat" name=ver id=ver value=ver ></td>
        </tr></form>
        ';
    }
    
   
   ?>
   
  </tbody>
</table>