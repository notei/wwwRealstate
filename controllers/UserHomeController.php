<?php

namespace app\controllers;

use Yii;
use app\models\Propiedades;
use app\models\Direcciones;
use app\models\Empresas;

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
        $modelPropiedades =Propiedades::find()->where(['id_usuario'=> Yii::$app->user->identity->id_usuario])->all();
        $modelPersonas = PersonasContactos::find()->where(['id_usuario'=> Yii::$app->user->identity->id_usuario])->all();

        $empresa = empresas::find()->where(['id_empresa'=> Yii::$app->user->identity->id_empresa])->one();

        $numPropiedadesPublicadas = count(Propiedades::find()->where(['id_usuario'=> Yii::$app->user->identity->id_usuario, 'b_publicada'=>1])->all());

        return $this->render('index',[
            'modelPropiedades' => $modelPropiedades,
            'modelPersonas' => $modelPersonas,
            'numPropiedadesPublicadas' => $numPropiedadesPublicadas,
            'empresa' => $empresa,
        ]);
    }


    /**
     * Lists all Propiedades models.
     * @return mixed
     */
    public function actionPropiedades()
    {
        $model =Propiedades::find()->all();

        return $this->render('propiedades',[
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
                ['/user-home/propiedades']);
    }

    

    
}
