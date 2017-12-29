<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RelPropiedadCaracteristicasSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="rel-propiedad-caracteristica-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_propiedad') ?>

    <?= $form->field($model, 'id_caracteristica_propiedad') ?>

    <?= $form->field($model, 'txt_valor') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
