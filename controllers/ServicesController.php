<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

use app\models\CatMunicipios;
use app\models\CatColonias;
use app\models\CatCiudades;
use app\models\CatEstados;

/**
 * DireccionesController implements the CRUD actions for Direcciones model.
 */
class ServicesController extends Controller
{
	/**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Direcciones models.
     * @return mixed
     */
    public function actionIndex()
    {}


    public function actionEstadosList($id){

    	$model = CatEstados::find()->all();
    	$data = ArrayHelper::map($model, 'id_estado', 'txt_nombre');

    	echo json_encode($data);
    	return;
    }

    public function actionCiudadesList($id){

        $model = CatCiudades::find()->all();
        $data = ArrayHelper::map($model, 'id_estado', 'txt_nombre');

        echo json_encode($data);
        return;
    }

    public function actionMunicipiosList($id){

    	$model = CatMunicipios::find()->where(['id_estado'=>$id])->all();
    	$data = ArrayHelper::map($model, 'id_municipio', 'txt_nombre');

    	echo json_encode($data);
    	return;
    }

    public function actionColoniasList($id){

    	$model = CatColonias::find()->all();
    	$data = ArrayHelper::map($model, 'id_colonia', 'txt_nombre');

    	echo json_encode($data);
    	return;
    }
}
?>