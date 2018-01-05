<?php

namespace app\controllers;

use Yii;
use app\models\Usuarios;
use app\models\UsuariosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use app\models\PersonasContactos;
use app\models\CatTiposContactos;
use app\models\MediosContactos;

/**
 * UsuariosController implements the CRUD actions for Usuarios model.
 */
class UsuariosController extends Controller
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
     * Lists all Usuarios models.
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->redirect(['usuarios/create', ]);
    }

    /**
     * Displays a single Usuarios model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Usuarios model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Usuarios();



        if ($model->load(Yii::$app->request->post() ) ){
            $model->txt_token = uniqid('u_', true);
            $model->b_administrador = 1;
            $model->b_habilitado = 0;
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            //Guarda el nombre del contacto
            $contacto = new PersonasContactos();
            $contacto->id_usuario = $model->id_usuario;
            $contacto->txt_nombre = $model->txt_nombre;
            $contacto->txt_token = uniqid('c_', true);

            $contacto->save();
            

            //Crea el contacto por correo electrónico
            $medio = new MediosContactos();
            $medio->id_persona_contacto = $contacto->id_persona_contacto;
            $medio->id_tipo_contacto = 1;
            $medio->txt_valor = $model->txt_correo;

            $medio->save();

            if($model->id_tipo_usuario == 1){
                return $this->redirect(['personas-contactos/create', 'id' => $model->txt_token]);
            }else{
                return $this->redirect(['empresas/create', 'id' => $model->txt_token]);
            }
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Usuarios model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_usuario]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Usuarios model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Usuarios model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Usuarios the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Usuarios::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}