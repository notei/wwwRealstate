<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cat_municipios".
 *
 * @property integer $id_municipios
 * @property integer $id_estado
 * @property integer $b_habilitado
 * @property string $txt_nombre
 *
 * @property CatEstados $idEstado
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
            [['id_municipios', 'id_estado', 'txt_nombre'], 'required'],
            [['id_municipios', 'id_estado', 'b_habilitado'], 'integer'],
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
            'id_municipios' => 'Id Municipios',
            'id_estado' => 'Id Estado',
            'b_habilitado' => 'B Habilitado',
            'txt_nombre' => 'Txt Nombre',
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
    public function getDirecciones()
    {
        return $this->hasMany(Direcciones::className(), ['id_municipio' => 'id_municipios']);
    }
}
