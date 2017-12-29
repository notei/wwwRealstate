<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cat_pais".
 *
 * @property integer $id_pais
 * @property string $txt_nombre
 * @property integer $b_habilitado
 *
 * @property CatEstados[] $catEstados
 */
class catPaises extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cat_pais';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_pais', 'txt_nombre', 'b_habilitado'], 'required'],
            [['id_pais', 'b_habilitado'], 'integer'],
            [['txt_nombre'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_pais' => 'Id Pais',
            'txt_nombre' => 'Txt Nombre',
            'b_habilitado' => 'B Habilitado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCatEstados()
    {
        return $this->hasMany(CatEstados::className(), ['id_pais' => 'id_pais']);
    }
}
