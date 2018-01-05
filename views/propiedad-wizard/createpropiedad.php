<?php

use yii\helpers\Html;

$this->title = 'Agregar nueva propiedad';
?>

<div class="row">
<div class="col-md-12">



    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formpropiedad', [
        'model' => $model,
        'tiposPropiedad' => $tiposPropiedad,
        'personasContacto' => $personasContacto,
    ]) ?>



</div>
</div>