<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Entrada de usarios';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <div class="col-md-6 offset-md-3">
        
    </div>
</div>

<div class="row">    
    <div class="col-md-6 offset-md-3">


        <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        
            ]); ?>

    <div class="card">
        <div class="card-header">
            <?= Html::encode($this->title) ?>
        </div>
        <div class="card-block">
        
            

                <?= $form->field($model, 'username')->textInput(['autofocus' => true, ])->label('Correo electrónico') ?>

                <?= $form->field($model, 'password')->passwordInput()->label('Contraseña') ?>

                <?= $form->field($model, 'rememberMe')->checkbox()->label('Recordarme') ?>
                </div>

           

             <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <?= Html::submitButton('Entrar', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                        <?= Html::a('No tengo cuenta',['usuarios/create'], ['class' => 'btn btn-link']) ?>
                </li>
            </ul>
        </div>  
    </div>

</div>

 <?php ActiveForm::end(); ?>



    </div>
</div>    

