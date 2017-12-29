<?php

namespace app\controllers;

use Yii;
use app\models\RelPropiedadCaracteristica;
use app\models\RelPropiedadCaracteristicasSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * RelPropiedadCaracteristicasController implements the CRUD actions for RelPropiedadCaracteristica model.
 */
class RelPropiedadCaracteristicasController extends Controller
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
     * Lists all RelPropiedadCaracteristica models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RelPropiedadCaracteristicasSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single RelPropiedadCaracteristica model.
     * @param integer $id_propiedad
     * @param integer $id_caracteristica_propiedad
     * @return mixed
     */
    public function actionView($id_propiedad, $id_caracteristica_propiedad)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_propiedad, $id_caracteristica_propiedad),
        ]);
    }

    /**
     * Creates a new RelPropiedadCaracteristica model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new RelPropiedadCaracteristica();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_propiedad' => $model->id_propiedad, 'id_caracteristica_propiedad' => $model->id_caracteristica_propiedad]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing RelPropiedadCaracteristica model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id_propiedad
     * @param integer $id_caracteristica_propiedad
     * @return mixed
     */
    public function actionUpdate($id_propiedad, $id_caracteristica_propiedad)
    {
        $model = $this->findModel($id_propiedad, $id_caracteristica_propiedad);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_propiedad' => $model->id_propiedad, 'id_caracteristica_propiedad' => $model->id_caracteristica_propiedad]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing RelPropiedadCaracteristica model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id_propiedad
     * @param integer $id_caracteristica_propiedad
     * @return mixed
     */
    public function actionDelete($id_propiedad, $id_caracteristica_propiedad)
    {
        $this->findModel($id_propiedad, $id_caracteristica_propiedad)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the RelPropiedadCaracteristica model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id_propiedad
     * @param integer $id_caracteristica_propiedad
     * @return RelPropiedadCaracteristica the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_propiedad, $id_caracteristica_propiedad)
    {
        if (($model = RelPropiedadCaracteristica::findOne(['id_propiedad' => $id_propiedad, 'id_caracteristica_propiedad' => $id_caracteristica_propiedad])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
