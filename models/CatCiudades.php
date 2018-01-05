<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cat_ciudades".
 *
 * @property integer $id_ciudad
 * @property integer $id_estado
 * @property string $txt_nombre
 * @property integer $b_habilitado
 *
 * @property CatEstados $idEstado
 * @property CatMunicipios[] $catMunicipios
 * @property Direcciones[] $direcciones
 */
class CatCiudades extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cat_ciudades';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_ciudad', 'id_estado', 'txt_nombre'], 'required'],
            [['id_ciudad', 'id_estado', 'b_habilitado'], 'integer'],
            [['txt_nombre'], 'string', 'max' => 45],
            [['id_estado'], 'exist', 'skipOnError' => true, 'targetClass' => CatEstados::className(), 'targetAttribute' => ['id_estado' => 'id_estado']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_ciudad' => 'Id Ciudad',
            'id_estado' => 'Id Estado',
            'txt_nombre' => 'Txt Nombre',
            'b_habilitado' => 'B Habilitado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdEstado()
    {
        return $this->hasOne(CatEstados::className(), ['id_estado' => 'id_estado']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCatMunicipios()
    {
        return $this->hasMany(CatMunicipios::className(), ['id_ciudad' => 'id_ciudad']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDirecciones()
    {
        return $this->hasMany(Direcciones::className(), ['id_ciudad' => 'id_ciudad']);
    }
}
