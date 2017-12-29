<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RelPropiedadCaracteristicasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Rel Propiedad Caracteristicas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rel-propiedad-caracteristica-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Rel Propiedad Caracteristica', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_propiedad',
            'id_caracteristica_propiedad',
            'txt_valor',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
