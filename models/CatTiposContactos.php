<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cat_tipos_contactos".
 *
 * @property integer $id_tipo_contacto
 * @property string $txt_nombre
 * @property integer $b_habilitado
 *
 * @property MediosContactos[] $mediosContactos
 */
class CatTiposContactos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cat_tipos_contactos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_tipo_contacto', 'txt_nombre', 'b_habilitado'], 'required'],
            [['id_tipo_contacto', 'b_habilitado'], 'integer'],
            [['txt_nombre'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_tipo_contacto' => 'Id Tipo Contacto',
            'txt_nombre' => 'Txt Nombre',
            'b_habilitado' => 'B Habilitado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMediosContactos()
    {
        return $this->hasMany(MediosContactos::className(), ['id_tipo_contacto' => 'id_tipo_contacto']);
    }
}
