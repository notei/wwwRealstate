<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Empresas */

$this->title = $model->id_empresa;
$this->params['breadcrumbs'][] = ['label' => 'Empresas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="empresas-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_empresa], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_empresa], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_empresa',
            'txt_nombre',
            'txt_rfc',
            'txt_direccion',
            'txt_persona_contacto',
            'txt_telefono',
            'txt_correo',
            'txt_cp',
            'id_municipio',
            'id_estado',
            'id_pais',
            'b_habilitado',
            'txt_calle',
            'txt_num_exterior',
            'txt_num_interior',
            'txt_colonia',
            'num_lat',
            'num_long',
            'fch_creacion',
        ],
    ]) ?>

</div>
