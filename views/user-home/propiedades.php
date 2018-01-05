<h1>Home</h1>

<p>Mis propiedades</p>


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
                <img src="<?=Yii::$app->homeUrl?>img/ico/ico_graph.png" class="ico">
                100 vistas
            </p>
            <p class="card-text">
                <img src="<?=Yii::$app->homeUrl?>img/ico/ico_person.png" class="ico">
                <?=$item->idPersonaContacto->txt_nombre?>
            </p>
            <p class="card-text">
              <img src="<?=Yii::$app->homeUrl?>img/ico/ico_price.png" class="ico"> $<?=number_format($item->num_precio, 2, '.', ',')?>
            </p>
            <p class="card-text">
              <img src="<?=Yii::$app->homeUrl?>img/ico/ico_loc.png" class="ico"> Col. <?=$item->direcciones[0]->txt_colonia?>, 
              <?=$item->direcciones[0]->idMunicipio->txt_nombre?>, 
              <?=$item->direcciones[0]->idCiudad->txt_nombre?>
              <?=$item->direcciones[0]->idEstado->txt_nombre?>
              
            </p>
            <p class="card-text">
              <img src="<?=Yii::$app->homeUrl?>img/ico/ico_size.png" class="ico"> 
              <?=$item->num_metros?> m2
            </p>  
              <?php 
              foreach ($item->relPropiedadCaracteristicas as $elem):
              ?>
                <p class="card-text">
                  <?=$elem->idCaracteristicaPropiedad->txt_nombre?>:
                  <?=$elem->txt_valor?>
                </p>    
              <?endforeach?>
            </p>


            <hr>
            <a href="<?=Yii::$app->homeUrl?>propiedades/view?id=<?=$item->txt_token?>" class=""><img src="<?=Yii::$app->homeUrl?>img/ico/ico_ver.png" class="ico"></a>
            
            <a href="<?=Yii::$app->homeUrl?>propiedad-wizard?token=<?=$item->txt_token?>" class=""><img src="<?=Yii::$app->homeUrl?>img/ico/ico_edit.png" class="ico"></a>
           
            	<a href="<?=Yii::$app->homeUrl?>user-home/publish?token=<?=$item->txt_token?>" class="">
                <?if($item->b_publicada==0):?>
                  <img src="<?=Yii::$app->homeUrl?>img/ico/ico_publish.png" class="ico">
                <?else:?>
                    <img src="<?=Yii::$app->homeUrl?>img/ico/ico_unpublish.png" class="ico">
                <?endif?>  
              </a>
              <a href="<?=Yii::$app->homeUrl?>user-home/sale?token=<?=$item->txt_token?>" class="btn btn-success">Vendida</a>
            

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