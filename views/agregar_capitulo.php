<?php
require_once("models/usuario_modelo.php");
$id = $_REQUEST['id'];
$nombre = $_REQUEST['nombre'];
$capi = new usuario_modelo();
 
//echo $id;

?>
  <form method="POST"  action="?c=usuario_controller&a=opcionesIA" >
 <input type=hidden  name="nombre" value="<?php echo  $nombre;?>" >
 <input type=hidden  name="id" value="<?php echo  $id;?>" >
<br><br><br><br>
<table class="table table-bordered table-dark">
  <thead>
    <tr>
      <th scope="col">nombre</th>
      <th scope="col">Numero Capitulo</th>
      <th scope="col">Imagen</th>
      <th scope="col">Editar</th>     
    </tr>
  </thead>
  <tbody>

      <?php
      $capitu =  $capi->seleccionarCapitulos($id);
      foreach($capitu as $row){
       
        echo '  
        
        <tr>
          <input type=hidden   name="capitulo" value='.$row['capitulo'].'>
          <input type=hidden  name="numeroCapitulo" value='.$row['numeroCapitulo'].'>
           <td>'.$row['nombre'].'</td>
          <td>'.$row['numeroCapitulo'].'</td>
          <td><img  src='.$row['imagenSerie'].'  width="100" height="100" ></td>
          <td><button id="modifica" name="modifica" value="modifica" class="btn btn-secondary btn-block btn-flat" type="submit" >Editar</button></td>
        </tr>
        ';
    }     
   ?>
  </tbody>
</table>
<button id="registra" name="registra" value="registra" class="btn btn-secondary btn-block btn-flat" type="submit" >Agregar Capitulo</button>
  </form>