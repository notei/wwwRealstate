<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Propiedades */

$this->title = 'Update Propiedades: ' . $model->id_propiedad;
$this->params['breadcrumbs'][] = ['label' => 'Propiedades', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_propiedad, 'url' => ['view', 'id' => $model->id_propiedad]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="propiedades-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
