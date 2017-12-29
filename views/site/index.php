<?php

/* @var $this yii\web\View */

$this->title = 'Home';
?>
<div class="row">
<? foreach ($model as $item):
?>
    <div class="col-md-4 col-sm-12">

        
        <div class="card" style="width: 100%">
        <div style="background-color: #ccc">
          
        <!-- Carrusel -->
          <div id="carousel_<?=$item->id_propiedad?>" class="carousel slide" data-ride="carousel_<?=$item->id_propiedad?>">

            <ol class="carousel-indicators">
                <li data-target="#carousel_<?=$item->id_propiedad?>" data-slide-to="0" class="active"></li>
                <li data-target="#carousel_<?=$item->id_propiedad?>" data-slide-to="1"></li>
                <li data-target="#carousel_<?=$item->id_propiedad?>" data-slide-to="2"></li>
              </ol>

              <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                  <img class="d-block img-fluid" src="img/pexels-photo-186077.jpg" alt="First slide" style="height: 200px">
                </div>
                <div class="carousel-item">
                  <img class="d-block img-fluid" src="img/pexels-photo-186077.jpg" alt="Second slide" style="height: 200px">
                </div>
                <div class="carousel-item">
                  <img class="d-block img-fluid" src="img/pexels-photo-186077.jpg" alt="Third slide" style="height: 200px">
                </div>
              </div>
              <a class="carousel-control-prev" href="#carousel_<?=$item->id_propiedad?>" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carousel_<?=$item->id_propiedad?>" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div> 
            <!-- cierra carrusel -->
          

        </div>



          <div class="card-block">
            <h4 class="card-title"><?=$item->idTipoPropiedad->txt_nombre?></h4>
            <p class="card-text">
              <img src="img/ico/ico_price.png" class="ico"> $<?=number_format($item->num_precio, 2, '.', ',')?>
            </p>
            <p class="card-text">
              <img src="img/ico/ico_loc.png" class="ico"> Col. <?=$item->direcciones[0]->txt_colonia?>, 
              <?=$item->direcciones[0]->idMunicipio->txt_nombre?>, 
              <?=$item->direcciones[0]->idMunicipio->idEstado->txt_nombre?>
            </p>
            <p class="card-text">
              <img src="img/ico/ico_size.png" class="ico"> 
              <?=$item->num_metros?> m2
            </p>  
              <?php 
              //var_dump($item->relPropiedadCaracteristicas);
              /*foreach ($item->relPropiedadCaracteristicas as $elem):
              ?>
                <p class="card-text">
                  <?=$elem->idCaracteristicaPropiedad->txt_nombre?>:
                  <?=$elem->txt_valor?>
                </p>    
              <?php                
              endforeach
              */
              ?>
            </p>
            
            <a href="index.php?r=propiedades%2Fview&id=<?=$item->txt_token?>" class="btn btn-primary">Ver propiedad</a>
          </div>
        </div>

    </div>
<? endforeach; ?>
</div>



<script type="text/javascript">

$( document ).ready(function() {

        console.log("foreach");
    $('.carousel').each(function(index){
        console.log($(this));
        $(this).carousel();
    });
});

    
</script>
