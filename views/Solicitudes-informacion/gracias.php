<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\SolicitudesInformacion */


?>
<div class="solicitudes-informacion-view">

    <h2>Solicitud recibida</h2>

    <label>Nombre</label>
    <span><?=$model->txt_nombre?></span>

    <label>Correo</label>
    <span><?=$model->txt_correo?></span>

    <label>Teléfono</label>
    <span><?=$model->txt_telefono?></span>

    <label>Mensaje</label>
    <span><?=$model->txt_descripcion?></span>

    <label>Fecha</label>
    <span><?=$model->fch_creacion?></span>
</div>
