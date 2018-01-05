<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\RelPropiedadCaracteristica */

$this->title = 'Caracteristicas';
$this->params['breadcrumbs'][] = ['label' => 'Rel Propiedad Caracteristicas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rel-propiedad-caracteristica-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formcaracteristica', [
        'model' => $model,
        'tiposCaracteristicas' => $tiposCaracteristicas,
        'valuesModel' => $valuesModel,
    ]) ?>

</div>
