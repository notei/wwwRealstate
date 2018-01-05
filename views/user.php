<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Usuarios */
/* @var $form ActiveForm */
?>
<div class="user">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'id_usuario') ?>
        <?= $form->field($model, 'id_tipo_usuario') ?>
        <?= $form->field($model, 'txt_correo') ?>
        <?= $form->field($model, 'txt_password') ?>
        <?= $form->field($model, 'txt_authkey') ?>
        <?= $form->field($model, 'id_empresa') ?>
        <?= $form->field($model, 'b_administrador') ?>
        <?= $form->field($model, 'b_habilitado') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- user -->
