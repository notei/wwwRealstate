<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\FotografiasSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="fotografias-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_fotografia') ?>

    <?= $form->field($model, 'id_propiedad') ?>

    <?= $form->field($model, 'txt_url') ?>

    <?= $form->field($model, 'b_flaged') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
