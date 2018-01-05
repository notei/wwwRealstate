<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PersonasContactos */

$this->title = 'Update Personas Contactos: ' . $model->id_persona_contacto;
$this->params['breadcrumbs'][] = ['label' => 'Personas Contactos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_persona_contacto, 'url' => ['view', 'id' => $model->id_persona_contacto]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="personas-contactos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
