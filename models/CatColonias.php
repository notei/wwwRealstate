<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cat_colonias".
 *
 * @property integer $id_colonia
 * @property integer $id_municipio
 * @property string $txt_nombre
 * @property integer $b_habilitado
 *
 * @property CatMunicipios $idMunicipio
 * @property Direcciones[] $direcciones
 */
class CatColonias extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cat_colonias';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_colonia', 'id_municipio', 'txt_nombre'], 'required'],
            [['id_colonia', 'id_municipio', 'b_habilitado'], 'integer'],
            [['txt_nombre'], 'string', 'max' => 45],
            [['id_municipio'], 'exist', 'skipOnError' => true, 'targetClass' => CatMunicipios::className(), 'targetAttribute' => ['id_municipio' => 'id_municipio']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_colonia' => 'Id Colonia',
            'id_municipio' => 'Id Municipio',
            'txt_nombre' => 'Txt Nombre',
            'b_habilitado' => 'B Habilitado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdMunicipio()
    {
        return $this->hasOne(CatMunicipios::className(), ['id_municipio' => 'id_municipio']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDirecciones()
    {
        return $this->hasMany(Direcciones::className(), ['id_colonia' => 'id_colonia']);
    }
}
