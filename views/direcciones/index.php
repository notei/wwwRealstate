<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DireccionesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Direcciones';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="direcciones-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Direcciones', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_direccion',
            'id_propiedad',
            'id_municipio',
            'num_cp',
            'num_lat',
            // 'num_lon',
            // 'txt_calle',
            // 'txt_num_exterior',
            // 'txt_num_interior',
            // 'txt_colonia',
            // 'txt_token',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
