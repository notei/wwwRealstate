<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "medios_contactos".
 *
 * @property integer $id_medio_contacto
 * @property integer $id_persona_contacto
 * @property integer $id_propiedad
 * @property integer $id_tipo_contacto
 * @property string $txt_valor
 *
 * @property Propiedades $idPropiedad
 * @property CatTiposContactos $idTipoContacto
 * @property PersonasContactos $idPersonaContacto
 */
class MediosContactos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'medios_contactos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_medio_contacto', 'id_persona_contacto', 'id_propiedad', 'id_tipo_contacto'], 'required'],
            [['id_medio_contacto', 'id_persona_contacto', 'id_propiedad', 'id_tipo_contacto'], 'integer'],
            [['txt_valor'], 'string', 'max' => 45],
            [['id_propiedad'], 'exist', 'skipOnError' => true, 'targetClass' => Propiedades::className(), 'targetAttribute' => ['id_propiedad' => 'id_propiedad']],
            [['id_tipo_contacto'], 'exist', 'skipOnError' => true, 'targetClass' => CatTiposContactos::className(), 'targetAttribute' => ['id_tipo_contacto' => 'id_tipo_contacto']],
            [['id_persona_contacto'], 'exist', 'skipOnError' => true, 'targetClass' => PersonasContactos::className(), 'targetAttribute' => ['id_persona_contacto' => 'id_persona_contacto']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_medio_contacto' => 'Id Medio Contacto',
            'id_persona_contacto' => 'Id Persona Contacto',
            'id_propiedad' => 'Id Propiedad',
            'id_tipo_contacto' => 'Id Tipo Contacto',
            'txt_valor' => 'Txt Valor',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPropiedad()
    {
        return $this->hasOne(Propiedades::className(), ['id_propiedad' => 'id_propiedad']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdTipoContacto()
    {
        return $this->hasOne(CatTiposContactos::className(), ['id_tipo_contacto' => 'id_tipo_contacto']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPersonaContacto()
    {
        return $this->hasOne(PersonasContactos::className(), ['id_persona_contacto' => 'id_persona_contacto']);
    }
}
