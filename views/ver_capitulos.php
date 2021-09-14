<?php
require_once("models/usuario_modelo.php");
$id = $_REQUEST['id'];
$nombre = $_REQUEST['nombre'];
$capi = new usuario_modelo();
$capitu =  $capi->seleccionarCapitulos($id);
//echo $id;
$imagen = "";
$nom = "";
$descrip = "";
foreach($capitu as $row){
    $imagen = $row['imagenSerie'];
    $nom = $row['nombre'];
    $descrip = $row['descripcion'];
}

echo '<table class="table table-bordered " style="text-align:center;">
<thead>

</thead>
<tr><td><div  style="color:#FFFF;"  ><h2>'.$nom.'</h2></div></td></tr><tr>
<td> <img  src='.$row['imagenSerie'].'  width="300" height="300" ></td>
</tr><tr><td style="background-color: darkgray;"><strong><div style="color:#FFFF; " >'.$descrip.'</div></strong></td></tr>'
;


?>

<table class="table table-bordered table-dark" style="text-align:center;">
  <thead>
    <tr>
      
      <th scope="col"><center>Numero Capitulo</center></th>
     
      <th scope="col"><center>Capitulos</center></th>     
      
    </tr>
  </thead>
  <tbody>

  <form   >


      <?php
   
      foreach($capitu as $row){
       $capitulo = $row['numeroCapitulo'];
       $cap = $row['capitulo'];
        echo '  
        
        <tr>
         
        
          <td><h3>'.$row['numeroCapitulo'].'</h3></td>
          <!-- <td><img  src=images/monitor.jpg  width="200" height="150"  data-toggle="modal" data-target="#myModal" ></td> 
          <td> <a class="iframe" id="open_video" href="https://www.youtube.com/embed/'.$cap.'"><img    src=images/monitor.jpg  width="200" height="150"  ></a></td>
            -->
         <td><iframe src="https://www.youtube.com/embed/'.$cap.'" height="400" width="600" name="demo">
          <p>Su navegador no es compatible con iframes</p>
        </iframe></td>

      
         
        </tr>


<div class="container">
 

        
        ';
    }     
   ?>
  </tbody>
</table>

  </form> 

  

  <script type="text/javascript">
$(document).ready(function() {
	$("a#open_video").fancybox();
});
</script>


</div>