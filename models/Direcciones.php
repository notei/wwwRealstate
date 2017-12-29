<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "direcciones".
 *
 * @property integer $id_direccion
 * @property integer $id_propiedad
 * @property integer $id_municipio
 * @property string $num_cp
 * @property double $num_lat
 * @property double $num_lon
 * @property string $txt_calle
 * @property string $txt_num_exterior
 * @property string $txt_num_interior
 * @property string $txt_colonia
 * @property string $txt_token
 *
 * @property CatMunicipios $idMunicipio
 * @property Propiedades $idPropiedad
 */
class Direcciones extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'direcciones';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_propiedad', 'id_municipio', 'num_cp', 'num_lat', 'num_lon', 'txt_calle', 'txt_num_exterior', 'txt_colonia'], 'required'],
            [['id_propiedad', 'id_municipio'], 'integer'],
            [['num_lat', 'num_lon'], 'number'],
            [['num_cp'], 'string', 'max' => 5],
            [['txt_calle', 'txt_num_exterior', 'txt_num_interior', 'txt_colonia', 'txt_token'], 'string', 'max' => 45],
            [['txt_token'], 'unique'],
            [['id_municipio'], 'exist', 'skipOnError' => true, 'targetClass' => CatMunicipios::className(), 'targetAttribute' => ['id_municipio' => 'id_municipios']],
            [['id_propiedad'], 'exist', 'skipOnError' => true, 'targetClass' => Propiedades::className(), 'targetAttribute' => ['id_propiedad' => 'id_propiedad']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_direccion' => 'Id Direccion',
            'id_propiedad' => 'Id Propiedad',
            'id_municipio' => 'Id Municipio',
            'num_cp' => 'Num Cp',
            'num_lat' => 'Num Lat',
            'num_lon' => 'Num Lon',
            'txt_calle' => 'Txt Calle',
            'txt_num_exterior' => 'Txt Num Exterior',
            'txt_num_interior' => 'Txt Num Interior',
            'txt_colonia' => 'Txt Colonia',
            'txt_token' => 'Txt Token',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdMunicipio()
    {
        return $this->hasOne(CatMunicipios::className(), ['id_municipios' => 'id_municipio']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPropiedad()
    {
        return $this->hasOne(Propiedades::className(), ['id_propiedad' => 'id_propiedad']);
    }
}
