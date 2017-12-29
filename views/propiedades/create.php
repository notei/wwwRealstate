
<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Propiedades */

$this->title = 'Create Propiedades';
$this->params['breadcrumbs'][] = ['label' => 'Propiedades', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="propiedades-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
