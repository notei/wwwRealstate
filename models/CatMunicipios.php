<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cat_municipios".
 *
 * @property integer $id_municipio
 * @property integer $b_habilitado
 * @property string $txt_nombre
 * @property integer $id_ciudad
 *
 * @property CatColonias[] $catColonias
 * @property CatCiudades $idCiudad
 * @property Direcciones[] $direcciones
 */
class CatMunicipios extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cat_municipios';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_municipio', 'txt_nombre', 'id_ciudad'], 'required'],
            [['id_municipio', 'b_habilitado', 'id_ciudad'], 'integer'],
            [['txt_nombre'], 'string', 'max' => 45],
            [['id_ciudad'], 'exist', 'skipOnError' => true, 'targetClass' => CatCiudades::className(), 'targetAttribute' => ['id_ciudad' => 'id_ciudad']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_municipio' => 'Id Municipio',
            'b_habilitado' => 'B Habilitado',
            'txt_nombre' => 'Txt Nombre',
            'id_ciudad' => 'Id Ciudad',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCatColonias()
    {
        return $this->hasMany(CatColonias::className(), ['id_municipio' => 'id_municipio']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdCiudad()
    {
        return $this->hasOne(CatCiudades::className(), ['id_ciudad' => 'id_ciudad']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDirecciones()
    {
        return $this->hasMany(Direcciones::className(), ['id_municipio' => 'id_municipio']);
    }
}
