<?php

namespace app\controllers;

use Yii;
use app\models\Propiedades;
use app\models\Direcciones;
use app\models\PropiedadesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use app\models\CatTipoPropiedades;
use app\models\PersonasContactos;
use app\models\RelPropiedadCaracteristica;
use app\models\Fotografias;
use app\models\UploadForm;
use app\models\CatCaracteristicasPropiedades;

use app\models\CatEstados;
use app\models\CatCiudades;
use app\models\CatMunicipios;

use yii\web\UploadedFile;

/**
 * PropiedadesController implements the CRUD actions for Propiedades model.
 */
class PropiedadWizardController extends Controller
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
    public function actionIndex($token = null)
    {
        $model = new Propiedades();
        if($token != null){
            $model = $model::find()->where(['txt_token'=> $token ])->one();
        }
        $tiposPropiedad = CatTipoPropiedades::find()->where(['b_habilitado' => 1])->all();
        $personasContacto = PersonasContactos::find()->all();

        if ($model->load(Yii::$app->request->post() ) ){
            if($token == null){
                $model->txt_token = uniqid('p_', true);
            }
            $model->b_publicada = 0;
            $model->id_estado_propiedad = 1;
            $model->id_usuario =  Yii::$app->user->identity->id_usuario;
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(
                ['direccion', 
                'token' => $model->txt_token, 
                'id' => $model->id_propiedad
                ]);
        } else {
            return $this->render('createpropiedad', [
                'model' => $model,
                'tiposPropiedad' => $tiposPropiedad,
                'personasContacto' => $personasContacto,
            ]);
        }
    }

    public function actionDireccion($token,$id)
    {

        $estadoModel = CatEstados::find()->where(['b_habilitado'=>1])->all();
        $ciudadModel = CatCiudades::find()->where(['b_habilitado'=>1])->all();
        $municipioModel = CatMunicipios::find()->where(['b_habilitado'=>1])->all();


        $propiedad = Propiedades::find()->where(['txt_token' => $token])->one();
        $model = new Direcciones();
        $modelt = $model::find()->where(['id_propiedad' => $propiedad->id_propiedad])->one();

        if($modelt != null){
            $model = $modelt;
        }

        $model->id_propiedad = $propiedad->id_propiedad;

        if ($model->load(Yii::$app->request->post() ) ){
            $model->txt_token = uniqid('f_', true);
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(
                ['caracteristicas', 
                'token' => $propiedad->txt_token, 
                'id' => $propiedad->id_propiedad
                ]);
        } else {
            return $this->render('createdireccion', [
                'model' => $model,
                'estadoModel'=>$estadoModel,
                'ciudadModel'=>$ciudadModel,
                'municipioModel'=>$municipioModel,
            ]);
        }
    }


    public function actionCaracteristicas($token,$id)
    {

        

        $propiedad = Propiedades::find()->where(['txt_token' => $token])->one();
        $model = new RelPropiedadCaracteristica();

        $model->id_propiedad = $propiedad->id_propiedad;


        $valuesModel = RelPropiedadCaracteristica::find()->where(['id_propiedad'=> $propiedad->id_propiedad])->all();

        $ids = array();
        foreach ($valuesModel as $item) {
            array_push($ids,$item->id_caracteristica_propiedad);
        }


        $tiposCaracteristicas = CatCaracteristicasPropiedades::find()->where(['b_habilitado' => 1])->andWhere(['not in', 'id_caracteristicas_propiedades', $ids])->all();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            
            

            return $this->redirect(
                ['caracteristicas', 
                'token' => $propiedad->txt_token, 
                'id' => $propiedad->id_propiedad
                ]);


        } else {
            return $this->render('createcaracteristica', [
                'model' => $model,
                'tiposCaracteristicas' => $tiposCaracteristicas,
                'valuesModel' => $valuesModel,
            ]);
        }
    }


    /**
     * Creates a new Fotografias model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionFotografia($token,$id)
    {

        $propiedad = Propiedades::find()->where(['txt_token' => $token])->one();

        $model = new Fotografias();
        $modelUpload = new UploadForm();

        $model->id_propiedad = $propiedad->id_propiedad;
        $token = uniqid('f_', true);

        if ($modelUpload->load(Yii::$app->request->post() ) ){

            $model->txt_token = uniqid('f_', true);
            $model->b_flaged = 0;
            $model->txt_url = $token;

        }


        $resUpload = false; 

        if ($modelUpload->load(Yii::$app->request->post() )) {
            $modelUpload->imageFile = UploadedFile::getInstance($modelUpload, 'imageFile');
            $resUpload = $modelUpload->upload($propiedad->txt_token, $token);
        }

        if ($resUpload && $model->save()) {
            echo "saved";
            return $this->redirect(['fotografia',
             'id' => $model->id_fotografia,
             'token' => $propiedad->txt_token, 
                'id' => $propiedad->id_propiedad,
                ]);
        } else {
            return $this->render('createfotografia', [
                'model' => $modelUpload,
                'propiedad' => $propiedad,
            ]);
        }
    }

    
}
