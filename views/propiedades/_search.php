<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PropiedadesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="propiedades-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_propiedad') ?>

    <?= $form->field($model, 'id_tipo_propiedad') ?>

    <?= $form->field($model, 'id_persona_contacto') ?>

    <?= $form->field($model, 'id_estado_propiedad') ?>

    <?= $form->field($model, 'fch_publicacion') ?>

    <?php // echo $form->field($model, 'fch_venta') ?>

    <?php // echo $form->field($model, 'id_usuario') ?>

    <?php // echo $form->field($model, 'b_publicada') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
