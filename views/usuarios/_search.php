<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UsuariosSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="usuarios-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_usuario') ?>

    <?= $form->field($model, 'id_tipo_usuario') ?>

    <?= $form->field($model, 'txt_correo') ?>

    <?= $form->field($model, 'txt_password') ?>

    <?= $form->field($model, 'id_empresa') ?>

    <?php // echo $form->field($model, 'b_administrador') ?>

    <?php // echo $form->field($model, 'b_habilitado') ?>

    <?php // echo $form->field($model, 'txt_token') ?>

    <?php // echo $form->field($model, 'fch_registro') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
