<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Fotografias */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="fotografias-form">

    <?php $form = ActiveForm::begin(); ?>

   

    <?= $form->field($model, 'id_propiedad')->textInput() ?>

    <?= $form->field($model, 'txt_url')->textInput(['maxlength' => true]) ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
