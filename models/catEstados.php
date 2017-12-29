<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cat_estados".
 *
 * @property integer $id_estado
 * @property integer $id_pais
 * @property integer $b_habilitado
 * @property string $txt_nombre
 *
 * @property CatPais $idPais
 * @property CatMunicipios[] $catMunicipios
 */
class catEstados extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cat_estados';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_estado', 'id_pais', 'b_habilitado', 'txt_nombre'], 'required'],
            [['id_estado', 'id_pais', 'b_habilitado'], 'integer'],
            [['txt_nombre'], 'string', 'max' => 45],
            [['id_pais'], 'exist', 'skipOnError' => true, 'targetClass' => CatPais::className(), 'targetAttribute' => ['id_pais' => 'id_pais']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_estado' => 'Id Estado',
            'id_pais' => 'Id Pais',
            'b_habilitado' => 'B Habilitado',
            'txt_nombre' => 'Txt Nombre',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPais()
    {
        return $this->hasOne(CatPaises::className(), ['id_pais' => 'id_pais']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCatMunicipios()
    {
        return $this->hasMany(CatMunicipios::className(), ['id_estado' => 'id_estado']);
    }
}
