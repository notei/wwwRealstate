<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "rel_propiedad_caracteristica".
 *
 * @property integer $id_propiedad
 * @property integer $id_caracteristica_propiedad
 * @property string $txt_valor
 *
 * @property CatCaracteristicasPropiedades $idCaracteristicaPropiedad
 * @property Propiedades $idPropiedad
 */
class RelPropiedadCaracteristica extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'rel_propiedad_caracteristica';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_propiedad', 'id_caracteristica_propiedad'], 'required'],
            [['id_propiedad', 'id_caracteristica_propiedad'], 'integer'],
            [['txt_valor'], 'string', 'max' => 45],
            [['id_caracteristica_propiedad'], 'exist', 'skipOnError' => true, 'targetClass' => CatCaracteristicasPropiedades::className(), 'targetAttribute' => ['id_caracteristica_propiedad' => 'id_caracteristicas_propiedades']],
            [['id_propiedad'], 'exist', 'skipOnError' => true, 'targetClass' => Propiedades::className(), 'targetAttribute' => ['id_propiedad' => 'id_propiedad']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_propiedad' => 'Id Propiedad',
            'id_caracteristica_propiedad' => 'Id Caracteristica Propiedad',
            'txt_valor' => 'Txt Valor',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdCaracteristicaPropiedad()
    {
        return $this->hasOne(CatCaracteristicasPropiedades::className(), ['id_caracteristicas_propiedades' => 'id_caracteristica_propiedad']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPropiedad()
    {
        return $this->hasOne(Propiedades::className(), ['id_propiedad' => 'id_propiedad']);
    }
}
