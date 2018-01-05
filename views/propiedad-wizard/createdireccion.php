<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Direcciones */

$this->title = 'Dirección';
$this->params['breadcrumbs'][] = ['label' => 'Direcciones', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="direcciones-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formdireccion', [
        'model' => $model,
        'estadoModel'=>$estadoModel,
        'ciudadModel'=>$ciudadModel,
        'municipioModel'=>$municipioModel,
    ]) ?>

</div>
