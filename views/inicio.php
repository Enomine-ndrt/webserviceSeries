<?php
 require_once("models/usuario_modelo.php");
  
 session_start();

 ini_set("error_reporting",0);
 

 $modelo = new usuario_modelo();
 $se =  $modelo->seriesDisponibles();
 
?>

<style type="text/css">
            .colores{
                background-color: #000000;
            }
            .texto{
                width: 800px;
                height: 20px;
              background-color: #000000; 
            }
          
        </style>

  <br><br><br><br>
  <div id="carouselExampleIndicators" class="carousel slide  colores" data-ride="carousel">
  <ol class="carousel-indicators">
    <?php
    foreach($se as $row){
      $id = $row['id'];
      echo '<li data-target="#carouselExampleIndicators" data-slide-to="'.$id.'" class="active"></li>';
    }

    

    ?>
    <!--
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          -->
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
    
      <img  class="mx-auto d-block" src="https://kingstraining.com/wp-content/uploads/2016/07/1jwwo6.jpg" width="500" height="400"  alt="First slide">
    
    </div>

    <?php
      foreach($se as $row){
        $nombre = $row['nombre'];  
        $imagen = $row['imagenSerie'];

        echo'
      
        <div class="carousel-item">
          <img  class="mx-auto d-block" src="'.$imagen.'"   width="500" height="400"  alt="Second slide">
          <div  class="carousel-caption mx-auto d-block"><h5>Lista de series</h5><div class="mx-auto d-block"><p><h1>'.$nombre.'</h1><p></div></div>
        </div>';
      }
   
    ?>
   <!-- <div class="carousel-item">
      <img class="d-block w-100" src="..." alt="Third slide">
    </div>
  </div>
    -->
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
       