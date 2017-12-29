<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\FotografiasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Fotografias';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fotografias-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Fotografias', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_fotografia',
            'id_propiedad',
            'txt_url:url',
            'b_flaged',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
