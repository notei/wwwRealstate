<?php

namespace app\controllers;

use Yii;
use app\models\Propiedades;
use app\models\PropiedadesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\ContadorVisitas;

/**
 * PropiedadesController implements the CRUD actions for Propiedades model.
 */
class PropiedadesController extends Controller
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
     * Lists all Propiedades models.
     * @return mixed
     */
    public function actionIndex()
    {
     return $this->redirect(['site/index']);   
    }

    /**
     * Displays a single Propiedades model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {

        $model = Propiedades::find()->where(['txt_token' => $id])->one();
        if($model == null){
            return $this->redirect(['site/index']);         
        }


        $fechaVista = date_create()->format('Y-m-d');
        

        //Carga las vistas de la propiedad
        $visita = ContadorVisitas::find()->where(['fch_vista'=>$fechaVista, 'id_propiedad'=>$model->id_propiedad])->one();
        if($visita == null){
            $visita = new ContadorVisitas();
        }
        $visita->id_propiedad = $model->id_propiedad;
        $visita->num_contador = $visita->num_contador + 1;
        $visita->fch_vista = $fechaVista;

        $visita->save();

        return $this->render('view', [
            //'model' => $this->findModel($id),
            'model' => $model,
        ]);
    }

    /**
     * Creates a new Propiedades model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    /*
    public function actionCreate()
    {
        $model = new Propiedades();

        if ($model->load(Yii::$app->request->post() ) ){
            $model->txt_token = uniqid('p_', true);
            $model->b_publicada = 0;
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_propiedad]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }
    */

    /**
     * Updates an existing Propiedades model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    /*
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_propiedad]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }
    */
    /**
     * Deletes an existing Propiedades model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    /*
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
    */

    /**
     * Finds the Propiedades model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Propiedades the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    /*
    protected function findModel($id)
    {
        if (($model = Propiedades::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    */
}
