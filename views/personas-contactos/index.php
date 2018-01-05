<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PersonasContactoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Personas Contactos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="personas-contactos-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Personas Contactos', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_persona_contacto',
            'txt_nombre',
            'txt_token',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
