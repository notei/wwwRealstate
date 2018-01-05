<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\CatEstados;
use app\models\CatPaises;
use app\models\MediosContactos;
use app\models\CatTiposContactos;


/* @var $this yii\web\View */
/* @var $model app\models\Propiedades */

$this->title = Yii::$app->name . '-' .$model->idTipoPropiedad->txt_nombre;
$this->params['breadcrumbs'][] = ['label' => 'Propiedades', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="propiedades-view">

<h1><?=$model->idTipoPropiedad->txt_nombre ?></h1>


<div class="row">
    <div class="fotos col-md-8 col-sm-12">
        <!-- Carrusel -->
        <div 
            id="carousel_<?=$model->id_propiedad?>" 
            class="carousel slide" 
            data-ride="carousel_<?=$model->id_propiedad?>">

        <ol class="carousel-indicators">
            <?
                $fotos = $model->getFotografias()->all();
                $count = 0;
                foreach ($fotos as $item):?>
                <li data-target="#carousel_<?=$model->id_propiedad?>" 
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
                $fotos = $model->getFotografias()->all();
                $count = 0;
                foreach ($fotos as $item):?>
                    <div class="carousel-item <?=$count==0?'active':''?>">
                        <img class="d-block img-fluid" 
                        src="<?=Yii::$app->homeUrl?>uploads/<?=$model->txt_token?>/<?=$item->txt_url?>" 
                        style="width: 100%;
        height: 100%;
        object-fit: contain;">  
                    </div>
            <?php
                $count++;
                endforeach;
            ?>
              

            
            
          </div>
          <a class="carousel-control-prev" href="#carousel_<?=$model->id_propiedad?>" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carousel_<?=$model->id_propiedad?>" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div> 
        <!-- cierra carrusel -->

    <p class="txt_descripcion"><img src="<?=Yii::$app->homeUrl?>img/ico/ico_desc.png" class="ico"><?=$model->txt_descripcion?></p>

    </div>



    <div class="col-md-4 col-sm-12">
        <div class="area_container">
            <div id="forma_contacto">
                
            </div>
        </div>
    </div>
</div>

<!-- first row -->

<div class="row">
    <div class="col-md-4">
        <div class="area_container">
            <div class="title_container">
                <span class="ico">
                    <img src="<?=Yii::$app->homeUrl?>img/ico/ico_loc.png" class="ico">
                </span>
                <span class="title">Ubicación del inmueble</span> 
            </div> 
            <div class="body_container">              
                <?
                $verDir = $model->b_mostrar_direccion;
                $direcciones = $model->getDirecciones()->all();
                foreach ($direcciones as $item):
                    $municipio = $item->idMunicipio;
                    $estado = $item->idEstado;
                    $ciudad = $item->idCiudad;
                    $pais = $estado->idPais;
                    ?>
                    
                    <?php if($verDir): ?>
                        <?=$item->txt_calle?>
                        <?=$item->txt_num_exterior?> 
                        <?=$item->txt_num_interior?>
                    <?endif?>    
                    Col. <?=$item->txt_colonia?>
                    CP. <?=$item->num_cp?>, <?=$municipio->txt_nombre?>,
                    <?=$ciudad->txt_nombre?>,
                    <?=$estado->txt_nombre?>, 
                    <?=$pais->txt_nombre?>        
                <?php endforeach?>
            </div>
        </div>    
    </div>


    <div class="col-md-4">
        <div class="area_container">
            <div class="title_container">
                <span class="ico">
                    <img src="<?=Yii::$app->homeUrl?>img/ico/ico_house.png" class="ico">
                </span>
                <span class="title">Características</span> 
            </div> 
            <div class="body_container">
                <ul class="list_caracteristica">
                    <?
                    $caracteristicas = $model->getRelPropiedadCaracteristicas()->all();
                    
                    foreach ($caracteristicas as $item): ?>
                        <li>
                            <img src="<?=Yii::$app->homeUrl?>img/ico/<?=$item->idCaracteristicaPropiedad->txt_ico?>" class="ico">
                            <span class="title_caracteristica"><?=$item->idCaracteristicaPropiedad->txt_nombre?></span> 
                            <span class="body_caracteristica"><?=$item->txt_valor?></span>
                        </li>
                    <?php
                        endforeach
                    ?>
                </ul>
            </div>
        </div>
    </div>


    <div class="col-md-4">
        <div class="area_container">
            <div class="title_container">
                <span class="ico">
                    <img src="<?=Yii::$app->homeUrl?>img/ico/ico_person.png" class="ico">
                </span>
                <span class="title">Datos del anunciante</span> 
            </div> 
            <div class="body_container">
                <?php
                    $contacto = $model->idPersonaContacto;
                    $mediosContacto = $contacto->mediosContactos;
                ?>
                
                <?=$contacto->txt_nombre?>
                <ul class="list_caracteristica">
                    <?foreach ($mediosContacto as $item):?>

                        <li>
                            <span class="title_caracteristica"><?=$item->idTipoContacto->txt_nombre?></span> 
                            <span class="body_caracteristica"><?=$item->txt_valor?></span>
                        </li>
                            
                    <?endforeach?>
                </ul>
            </div>
        </div>


    </div>


    
</div>
<!-- termina second row -->

<div class="row">
<div class="col-md-12 col-sm-12">
<div id="map"></div>
</div>
</div>
<script>

$( document ).ready(function() {
  $( "#forma_contacto" ).load( "<?=Yii::$app->homeUrl?>solicitudes-informacion/create?token=<?=$model->txt_token?>" );
});


      function initMap() {
        var uluru = {lat: 19.5023719, lng: -99.2544794};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 14,
          center: uluru
        });
        var marker = new google.maps.Marker({
          position: uluru,
          map: map
        });
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDqH0iUfB-ljC8YfhbVwLw5YSEfsaTneC0&callback=initMap">
    </script>


</div>
