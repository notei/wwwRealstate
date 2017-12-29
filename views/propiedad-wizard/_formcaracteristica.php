<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\RelPropiedadCaracteristica */
/* @var $form yii\widgets\ActiveForm */
?>


<div class="row">
	<div class="col-md-12">
	    <?php $form = ActiveForm::begin(); ?>


		<?= Html::activeDropDownList($model, 'id_caracteristica_propiedad',
	      ArrayHelper::map($tiposCaracteristicas, 'id_caracteristicas_propiedades', 'txt_nombre') , ['class' => 'form-control']) ?>



	    <?= $form->field($model, 'txt_valor')->textInput(['maxlength' => true, 'class' => 'form-control']) ?>

	    <div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>



	    <?php ActiveForm::end(); ?>
	</div>
</div>
