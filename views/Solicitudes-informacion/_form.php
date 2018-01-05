<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SolicitudesInformacion */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="solicitudes-informacion-form">

    <?php $form = ActiveForm::begin(); ?>

   <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'txt_nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'txt_correo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'txt_telefono')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'txt_descripcion')->textArea(['maxlength' => true]) ?>

    <div class="form-group">
        <span class="btn btn-primary" onclick="sendSolicitud()">Solicitar información</span>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<script>
	function sendSolicitud(){
		var myForma = $("#w0"); 
		var post_url = myForma.attr("action"); //get form action url
	    var request_method = myForma.attr("method"); //get form GET/POST method
	    var form_data = myForma.serialize();

		$.ajax({
	        url : post_url,
	        type: request_method,
	        data : form_data
	    }).done(function(response){ //
	        $("#forma_contacto").html(response);
	    });
	}
</script>