<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Fotografias */

$this->title = 'Update Fotografias: ' . $model->id_fotografia;
$this->params['breadcrumbs'][] = ['label' => 'Fotografias', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_fotografia, 'url' => ['view', 'id' => $model->id_fotografia]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="fotografias-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
