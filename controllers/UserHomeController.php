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

use yii\web\UploadedFile;

/**
 * PropiedadesController implements the CRUD actions for Propiedades model.
 */
class UserHomeController extends Controller
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
        $model =Propiedades::find()->all();

        return $this->render('index',[
            'model' => $model,
        ]);
    }

    public function actionPublish($token)
    {
        //TODO validar que la propiedad le pertenezca al usuario logeado
        $model =Propiedades::find()->where(['txt_token'=> $token])->one();

        if($model != null){
            if($model->b_publicada == 0)
                $model->b_publicada = 1;
            else
                $model->b_publicada = 0;

            $model->save();
        }

        return $this->redirect(
                ['/user-home']);
    }

    

    
}
