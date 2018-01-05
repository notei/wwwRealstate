<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Empresas */
/* @var $form yii\widgets\ActiveForm */
?>



<h2>Datos fiscales</h2>
<hr>
    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'num_lat')->hiddenInput()->label(false) ?>
    
        <?= $form->field($model, 'num_long')->hiddenInput()->label(false) ?>



<div class="row">
    <div class="col-md-8">
        <?= $form->field($model, 'txt_nombre')->textInput(['maxlength' => true]) ?>
    </div>

    <div class="col-md-4">
        <?= $form->field($model, 'txt_rfc')->textInput(['maxlength' => true,'style' => 'text-transform: uppercase']) ?>
    </div>
</div>

<div class="row">
    <div class="col-md-8">
        <?= $form->field($model, 'txt_direccion')->textInput(['maxlength' => true]) ?>
    </div>
    
    <div class="col-md-4">
        <?= $form->field($model, 'txt_persona_contacto')->textInput(['maxlength' => true]) ?>
    </div>
</div>

<div class="row">
    <div class="col-md-3">
        <?= $form->field($model, 'txt_telefono')->textInput(['maxlength' => true]) ?>   
    </div>
    <div class="col-md-3">
        <?= $form->field($model, 'txt_correo')->textInput(['maxlength' => true]) ?>
    </div>
</div>

<h2>Dirección fisica</h2>
<hr>





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

<div class="row">
    <div class="col-md-3">
        <?= $form->field($model, 'txt_calle')->textInput(['maxlength' => true]) ?>
    
        <?= $form->field($model, 'txt_num_exterior')->textInput(['maxlength' => true]) ?>
    
        <?= $form->field($model, 'txt_num_interior')->textInput(['maxlength' => true]) ?>
    
        <?= $form->field($model, 'txt_cp')->textInput(['maxlength' => true]) ?>
    </div>


    <div class="col-md-9">
        <div id="map"></div>
    </div>

</div>

<div class="row">

    
        
    

</div>

<div class="row">
    <div class="col-md-12">
   
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
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
<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDqH0iUfB-ljC8YfhbVwLw5YSEfsaTneC0&callback=initMap">
</script> 
<script type="text/javascript" src="<?=Yii::$app->homeUrl?>js/maps.js"></script> 
<script type="text/javascript">
    
function parseAddress(dir){
        $("#empresas-txt_num_exterior").val(dir[0].short_name);
        $("#empresas-txt_calle").val(dir[1].short_name);
        $("#empresas-txt_colonia").val(dir[2].short_name);
        $("#empresas-txt_cp").val(dir[7].short_name);
      }

function updateLatLng(lat,lng){
        latIn = $("#empresas-num_lat");
        lngIn = $("#empresas-num_long");

        latIn.val(lat);
        lngIn.val(lng);
      }      

</script> 