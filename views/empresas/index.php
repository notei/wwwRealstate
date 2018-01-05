<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EmpresasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Empresas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="empresas-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Empresas', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_empresa',
            'txt_nombre',
            'txt_rfc',
            'txt_direccion',
            'txt_persona_contacto',
            // 'txt_telefono',
            // 'txt_correo',
            // 'txt_cp',
            // 'id_municipio',
            // 'id_estado',
            // 'id_pais',
            // 'b_habilitado',
            // 'txt_calle',
            // 'txt_num_exterior',
            // 'txt_num_interior',
            // 'txt_colonia',
            // 'num_lat',
            // 'num_long',
            // 'fch_creacion',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
