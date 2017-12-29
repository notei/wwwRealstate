<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RelPropiedadCaracteristica */

$this->title = 'Update Rel Propiedad Caracteristica: ' . $model->id_propiedad;
$this->params['breadcrumbs'][] = ['label' => 'Rel Propiedad Caracteristicas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_propiedad, 'url' => ['view', 'id_propiedad' => $model->id_propiedad, 'id_caracteristica_propiedad' => $model->id_caracteristica_propiedad]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="rel-propiedad-caracteristica-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
