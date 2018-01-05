<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Propiedades */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="propiedades-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model); ?>
   

<div class="row">

  <div class="col-md-6">
    <label for="">Tipo de propiedad</label>
    <?= Html::activeDropDownList($model, 'id_tipo_propiedad',
          ArrayHelper::map($tiposPropiedad, 'id_tipo_propiedad', 'txt_nombre') , ['class' => 'form-control']) ?>
  
    <label for="">Contacto</label>
    <?= Html::activeDropDownList($model, 'id_persona_contacto',
        ArrayHelper::map($personasContacto, 'id_persona_contacto', 'txt_nombre') , ['class' => 'form-control']) ?>
  
     <?= $form->field($model, 'num_precio',['inputOptions' => ['value' => Yii::$app->formatter->asDecimal($model->num_precio)]])->textInput() ?>
  
    <?= $form->field($model, 'num_metros')->textInput() ?>
  
    <?= $form->field($model, 'b_mostrar_direccion')->radioList(array('0'=>'No',1=>'Si')); ?>
 
</div> 


  <div class="col-md-6">
  <?= $form->field($model, 'txt_descripcion')->textarea(['rows' => '6'])->hint('Max 255 characters.'); ?>
  </div>
</div>  


<div class="row">
  <div class="col-md-12 button-bar">
        <?= Html::submitButton('Siguiente', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary' ]) ?>
  </div>
</div>



    <?php ActiveForm::end(); ?>

</div>
