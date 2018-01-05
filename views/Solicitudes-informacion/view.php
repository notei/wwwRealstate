<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\SolicitudesInformacion */

$this->title = $model->id_solicitud_informacion;
$this->params['breadcrumbs'][] = ['label' => 'Solicitudes Informacions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="solicitudes-informacion-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_solicitud_informacion], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_solicitud_informacion], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_solicitud_informacion',
            'id_propiedad',
            'txt_nombre',
            'txt_correo',
            'txt_telefono',
            'fch_creacion',
            'txt_descripcion',
        ],
    ]) ?>

</div>
