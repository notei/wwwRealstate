<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PersonasContactos */

$this->title = 'Create Personas Contactos';
$this->params['breadcrumbs'][] = ['label' => 'Personas Contactos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="personas-contactos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
