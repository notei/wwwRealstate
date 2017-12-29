<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Fotografias */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="fotografias-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <div class="row">
         <?= $form->field($model, 'imageFile')->fileInput() ?>
	</div>

    <div class="form-group">
        <?= Html::submitButton( 'Create', ['class' => 'btn btn-success' ]) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
