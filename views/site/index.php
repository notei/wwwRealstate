<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */

$this->title = 'Home';
?>


<form action="index.php" method="GET">

  <div class="row" id="search">
    <div class="col-md-2">
      <label>CP</label> 
      <input type="text" name="cp" class="form-find form-control" value="<?=$cp?>">
    </div>
    <div class="col-md-3">
      <label>Estado</label>
       <select name="estado" id="estado" class="form-find form-control" onchange="loadMunicipio(this.value)">
        <option></option>
      </select>

    </div>
    <div class="col-md-3">
      <label>Municipio</label>
      <select name="municipio" id="municipio" class="form-find form-control" onchange="loadColonias(this.value)">
        <option></option>
      </select>
    </div>
    <div class="col-md-3">
      <label>Colonia</label> 
      <select name="colonia" id="colonia" class="form-find form-control">
        <option></option>
      </select>
    </div>

    <div class="col-md-1 align-bottom">
    <label>&nbsp;</label> 
    <button type="submit" class="btn btn-primary align-bottom" aria-label="Left Align">
      <span class="oi oi-magnifying-glass"></span>
      Búscar
    </button>
     </div> 

  </div>
</form>

<div class="row">
<? foreach ($model as $item):
?>
    <div class="col-md-4 col-sm-12">

        
        <div class="card" style="width: 100%">
        <div style="background-color: #ccc">
          
        <!-- Carrusel -->
          <div id="carousel_<?=$item->id_propiedad?>" class="carousel slide" data-ride="carousel_<?=$item->id_propiedad?>">

            <ol class="carousel-indicators">
              <?
                  $fotos = $item->getFotografias()->all();
                  $count = 0;
                  foreach ($fotos as $pic):?>
                  <li data-target="#carousel_<?=$pic->id_propiedad?>" 
                      data-slide-to="<?=$count?>" 
                      class="<?=$count==0?'active':''?>">
                  </li>                    
              <?php
                  $count++;
                  endforeach;
              ?>
          </ol>

              <div class="carousel-inner" role="listbox">
                <?
                  $fotos = $item->getFotografias()->all();
                  $count = 0;
                  foreach ($fotos as $pic):?>
                      <div class="carousel-item <?=$count==0?'active':''?>">
                          <div class="carrusel_img" style="background-image: url('<?=Yii::$app->homeUrl?>uploads/<?=$item->txt_token?>/<?=$pic->txt_url?>');">
                           
                        </div>
                      </div>
              <?php
                  $count++;
                  endforeach;
              ?>
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
              <?=$item->direcciones[0]->idCiudad->txt_nombre?>,
              <?=$item->direcciones[0]->idEstado->txt_nombre?>
            </p>
            <p class="card-text">
              <img src="img/ico/ico_size.png" class="ico"> 
              <?=$item->num_metros?> m2
            </p>  
          
            
            
            <a href="<?=Yii::$app->homeUrl?>propiedades/view?id=<?=$item->txt_token?>" class="btn btn-primary">Ver propiedad</a>
          </div>
        </div>

    </div>
<? endforeach; ?>
</div>



<script type="text/javascript">

$( document ).ready(function() {

    // console.log("foreach");
    // $('.carousel').each(function(index){
    //     console.log($(this));
    //     $(this).carousel();
    // });

    //Carga el combo de estados
    loadEstados(1);
});    
</script>
<script type="text/javascript" src="<?=Yii::$app->homeUrl?>js/direcciones.js"></script>
