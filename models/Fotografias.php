<?php

namespace app\models;

use Yii;



/**
 * This is the model class for table "fotografias".
 *
 * @property integer $id_fotografia
 * @property integer $id_propiedad
 * @property string $txt_url
 * @property integer $b_flaged
 * @property string $txt_token
 *
 * @property Propiedades $idPropiedad
 */
class Fotografias extends \yii\db\ActiveRecord
{

    

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'fotografias';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_propiedad', 'txt_url', 'b_flaged', 'txt_token'], 'required'],
            [['id_propiedad', 'b_flaged'], 'integer'],
            [['txt_url', 'txt_token'], 'string', 'max' => 45],
            [['txt_token'], 'unique'],
            [['id_propiedad'], 'exist', 'skipOnError' => true, 'targetClass' => Propiedades::className(), 'targetAttribute' => ['id_propiedad' => 'id_propiedad']],
        ];
    }

    

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_fotografia' => 'Id Fotografia',
            'id_propiedad' => 'Id Propiedad',
            'txt_url' => 'Txt Url',
            'b_flaged' => 'B Flaged',
            'txt_token' => 'Txt Token',
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
