<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "personas_contactos".
 *
 * @property integer $id_persona_contacto
 * @property string $txt_nombre
 * @property string $txt_token
 *
 * @property MediosContactos[] $mediosContactos
 * @property Propiedades[] $propiedades
 */
class PersonasContactos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'personas_contactos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['txt_token'], 'required'],
            [['txt_nombre', 'txt_token'], 'string', 'max' => 45],
            [['txt_token'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_persona_contacto' => 'Id Persona Contacto',
            'txt_nombre' => 'Txt Nombre',
            'txt_token' => 'Txt Token',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMediosContactos()
    {
        return $this->hasMany(MediosContactos::className(), ['id_persona_contacto' => 'id_persona_contacto']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPropiedades()
    {
        return $this->hasMany(Propiedades::className(), ['id_persona_contacto' => 'id_persona_contacto']);
    }
}
