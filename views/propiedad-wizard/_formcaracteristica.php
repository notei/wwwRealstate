<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\RelPropiedadCaracteristica */
/* @var $form yii\widgets\ActiveForm */
?>








<?php $form = ActiveForm::begin(); ?>

<div class="row">

	<div class="col-md-6">
		<div class="card">
	      <div class="card-header">
	        Caracteristicas
	      </div>
	      <div class="card-block">
	        <h4 class="card-title">Propiedades</h4>
	        
	        <ul class="list-group list-group-flush">
				<?foreach ($valuesModel as $item): ?>
					<li class="list-group-item">
					<span class="title_caracteristica"><?=$item->idCaracteristicaPropiedad->txt_nombre ?></span> <span  class="body_caracteristica"><?=$item->txt_valor ?></span></li>
				<?endforeach ?>
			</ul>

	      </div>
	    </div>
    </div>


	<div class="col-md-3">
	<label>Característica</label>
		<?= Html::activeDropDownList($model, 'id_caracteristica_propiedad',
	      ArrayHelper::map($tiposCaracteristicas, 'id_caracteristicas_propiedades', 'txt_nombre') , ['class' => 'form-control']) ?>
	</div>

	<div class="col-md-3">
	    	<?= $form->field($model, 'txt_valor')->textInput(['maxlength' => true, 'class' => 'form-control']) ?>
	</div>

</div>


<div class="row">
  <div class="col-md-12 button-bar">
        <?= Html::submitButton($model->isNewRecord ? 'Agregar' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary' ]) ?>
        <a href="<?=Yii::$app->homeUrl?>propiedad-wizard/fotografia?token=<?=$model->idPropiedad->txt_token?>&id=<?=$model->idPropiedad->id_propiedad?>" class="btn btn-secondary">Siguiente</a>
  </div>
</div>



	    <?php ActiveForm::end(); ?>

