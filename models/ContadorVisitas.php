<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "contadores_visitas".
 *
 * @property integer $id_contador_visita
 * @property integer $id_propiedad
 * @property integer $num_contador
 * @property string $fch_vista
 *
 * @property Propiedades $idPropiedad
 */
class ContadorVisitas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'contadores_visitas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_propiedad', 'fch_vista'], 'required'],
            [['id_propiedad', 'num_contador'], 'integer'],
            [['fch_vista'], 'safe'],
            [['id_propiedad'], 'exist', 'skipOnError' => true, 'targetClass' => Propiedades::className(), 'targetAttribute' => ['id_propiedad' => 'id_propiedad']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_contador_visita' => 'Id Contador Visita',
            'id_propiedad' => 'Id Propiedad',
            'num_contador' => 'Num Contador',
            'fch_vista' => 'Fch Vista',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPropiedad()
    {
        return $this->hasOne(Propiedades::className(), ['id_propiedad' => 'id_propiedad']);
    }
}
