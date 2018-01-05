<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Usuarios */
/* @var $form yii\widgets\ActiveForm */
?>

<?php $form = ActiveForm::begin(); ?>
<div class="row">

    <div class="col-md-6 offset-md-3">

        <div class="card">
            <div class="card-header">
                Crear usuario
            </div>
            <div class="card-block">
            
                <?= $form->field($model, 'id_tipo_usuario')->radioList(array('1'=>'Soy una persona',2=>'Soy una empresa')); ?>
                <?= $form->field($model, 'txt_correo')->textInput(['maxlength' => true]) ?>
            
                <?= $form->field($model, 'txt_password')->textInput(['maxlength' => true])->passwordInput() ?>

                <?= $form->field($model, 'password_repeat')->textInput(['maxlength' => true])->passwordInput() ?>
            
                <?= $form->field($model, 'txt_nombre')->textInput(['maxlength' => true]) ?> 

                 <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <?= Html::submitButton($model->isNewRecord ? 'Siguiente' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                        <?= Html::a('Tengo una cuenta',['site/login'], ['class' => 'btn btn-link']) ?>
                    </li>
                </ul>
            </div>  
        </div>
    </div>
</div>

    <?php ActiveForm::end(); ?>


