<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\RelPropiedadCaracteristica */

$this->title = $model->id_propiedad;
$this->params['breadcrumbs'][] = ['label' => 'Rel Propiedad Caracteristicas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rel-propiedad-caracteristica-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id_propiedad' => $model->id_propiedad, 'id_caracteristica_propiedad' => $model->id_caracteristica_propiedad], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_propiedad' => $model->id_propiedad, 'id_caracteristica_propiedad' => $model->id_caracteristica_propiedad], [
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
            'id_propiedad',
            'id_caracteristica_propiedad',
            'txt_valor',
        ],
    ]) ?>

</div>
