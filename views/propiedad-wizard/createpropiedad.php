<?php

use yii\helpers\Html;

?>

<div class="row">
<div class="col-md-12">



    <h1>Propiedad</h1>

    <?= $this->render('_formpropiedad', [
        'model' => $model,
        'tiposPropiedad' => $tiposPropiedad,
        'personasContacto' => $personasContacto,
    ]) ?>



</div>
</div>