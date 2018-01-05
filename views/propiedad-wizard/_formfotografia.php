<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Fotografias */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="row">
	<div class="col-md-12 images-thumnail">
		<?php foreach ($propiedad->fotografias as $item):?>
			<img src="<?=Yii::$app->homeUrl?>uploads/<?=$propiedad->txt_token?>/<?=$item->txt_url?>" class="thumnail">
		<?php endforeach ?>
	</div>	
</div>

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

<div class="row">
    <div class="col-md-12">
         <?= $form->field($model, 'imageFile')->fileInput() ?>
    </div>
</div>

<div class="row">
  <div class="col-md-12 button-bar">
        
        <a href="<?=Yii::$app->homeUrl?>propiedad-wizard/caracteristicas?token=<?=$propiedad->txt_token?>&id=<?=$propiedad->id_propiedad?>" class="btn btn-secondary">Anterior</a>
        <?= Html::submitButton( 'Agregar', ['class' => 'btn btn-success' ]) ?>
        <a href="<?=Yii::$app->homeUrl?>user-home" class="btn btn-secondary">Siguiente</a>
  </div>
</div>

    <?php ActiveForm::end(); ?>


