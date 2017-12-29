<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Fotografias */

$this->title = 'Create Fotografias';
$this->params['breadcrumbs'][] = ['label' => 'Fotografias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fotografias-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
