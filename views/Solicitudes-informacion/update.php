<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SolicitudesInformacion */

$this->title = 'Update Solicitudes Informacion: ' . $model->id_solicitud_informacion;
$this->params['breadcrumbs'][] = ['label' => 'Solicitudes Informacions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_solicitud_informacion, 'url' => ['view', 'id' => $model->id_solicitud_informacion]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="solicitudes-informacion-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
