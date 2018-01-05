<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Direcciones */
/* @var $form yii\widgets\ActiveForm */
?>



    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'num_lat')->hiddenInput()->label(false) ?>
    <?= $form->field($model, 'num_lon')->hiddenInput()->label(false) ?>
    <?= $form->field($model, 'txt_colonia')->hiddenInput()->label(false) ?>


<div class="row">
  <div class="col-md-3">
    <?=$form->field($model, 'id_estado')->dropDownList(array(), ['prompt' => 'Seleccione Uno' ,'id'=>'estado' ,'onchange'=>'loadCiudades(this.value)']);?>
  </div>

  <div class="col-md-3">
    <?= $form->field($model, 'id_ciudad')->dropDownList(array(), ['prompt' => 'Seleccione Uno' ,'id'=>'ciudad','onchange'=>'loadMunicipio(this.value)']);?>
  </div>

  <div class="col-md-3">
    <?= $form->field($model, 'id_municipio')->dropDownList(array(), ['prompt' => 'Seleccione Uno' ,'id'=>'municipio','onchange'=>'loadColonias(this.value)']);?>
  </div>

  <div class="col-md-3">
     <?= $form->field($model, 'id_colonia')->dropDownList(array(), ['prompt' => 'Seleccione Uno' ,'id'=>'colonia']);?>
  </div>
</div>

<h3>Localización</h3>
<hr>


<div class="row">
  <div class="col-md-3">
    <?= $form->field($model, 'num_cp')->textInput(['maxlength' => true]) ?>
  
    <?= $form->field($model, 'txt_calle')->textInput(['maxlength' => true]) ?>
  
    <?= $form->field($model, 'txt_num_exterior')->textInput(['maxlength' => true]) ?>
  
    <?= $form->field($model, 'txt_num_interior')->textInput(['maxlength' => true]) ?>
  </div>



    
  <div class="col-md-9">
    <div id="map"></div>
  </div>
</div>
    
    
<div class="row">
  <div class="col-md-12 button-bar">
        <?= Html::submitButton($model->isNewRecord ? 'Siguiente' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary' ]) ?>
  </div>
</div>


    <?php ActiveForm::end(); ?>



<script type="text/javascript">

$( document ).ready(function() {
    loadEstados(1);
});    
</script>
<script type="text/javascript" src="<?=Yii::$app->homeUrl?>js/direcciones.js"></script>
<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDqH0iUfB-ljC8YfhbVwLw5YSEfsaTneC0&callback=initMap">
</script> 
<script type="text/javascript" src="<?=Yii::$app->homeUrl?>js/maps.js"></script> 
<script type="text/javascript">
  
  function parseAddress(dir){
        $("#direcciones-txt_num_exterior").val(dir[0].short_name);
        $("#direcciones-txt_calle").val(dir[1].short_name);
        $("#direcciones-txt_colonia").val(dir[2].short_name);
        $("#direcciones-num_cp").val(dir[7].short_name);
      }

  function updateLatLng(lat,lng){
        latIn = $("#direcciones-num_lat");
        lngIn = $("#direcciones-num_lon");

        latIn.val(lat);
        lngIn.val(lng);
      }
</script>

