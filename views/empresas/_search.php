<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EmpresasSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="empresas-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_empresa') ?>

    <?= $form->field($model, 'txt_nombre') ?>

    <?= $form->field($model, 'txt_rfc') ?>

    <?= $form->field($model, 'txt_direccion') ?>

    <?= $form->field($model, 'txt_persona_contacto') ?>

    <?php // echo $form->field($model, 'txt_telefono') ?>

    <?php // echo $form->field($model, 'txt_correo') ?>

    <?php // echo $form->field($model, 'txt_cp') ?>

    <?php // echo $form->field($model, 'id_municipio') ?>

    <?php // echo $form->field($model, 'id_estado') ?>

    <?php // echo $form->field($model, 'id_pais') ?>

    <?php // echo $form->field($model, 'b_habilitado') ?>

    <?php // echo $form->field($model, 'txt_calle') ?>

    <?php // echo $form->field($model, 'txt_num_exterior') ?>

    <?php // echo $form->field($model, 'txt_num_interior') ?>

    <?php // echo $form->field($model, 'txt_colonia') ?>

    <?php // echo $form->field($model, 'num_lat') ?>

    <?php // echo $form->field($model, 'num_long') ?>

    <?php // echo $form->field($model, 'fch_creacion') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
