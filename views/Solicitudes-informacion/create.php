<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\SolicitudesInformacion */
?>
<div class="solicitudes-informacion-create">

    <div class="title_container">
        <span class="ico">
            <img src="<?=Yii::$app->homeUrl?>img/ico/ico_info.png" class="ico">
        </span>
        <span class="title">Solicitar información</span> 
    </div> 
    <div class="body_container"> 
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>
    </div>

</div>
