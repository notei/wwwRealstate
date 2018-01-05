<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "solicitudes_informacion".
 *
 * @property integer $id_solicitud_informacion
 * @property integer $id_propiedad
 * @property string $txt_nombre
 * @property string $txt_correo
 * @property string $txt_telefono
 * @property string $fch_creacion
 * @property string $txt_descripcion
 *
 * @property Propiedades $idPropiedad
 */
class SolicitudesInformacion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'solicitudes_informacion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_propiedad', 'txt_nombre', 'txt_correo', 'txt_descripcion'], 'required'],
            [['id_propiedad'], 'integer'],
            [['fch_creacion'], 'safe'],
            [['txt_nombre', 'txt_correo', 'txt_telefono'], 'string', 'max' => 45],
            [['txt_descripcion'], 'string', 'max' => 500],
            [['id_propiedad'], 'exist', 'skipOnError' => true, 'targetClass' => Propiedades::className(), 'targetAttribute' => ['id_propiedad' => 'id_propiedad']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_solicitud_informacion' => 'Id Solicitud Informacion',
            'id_propiedad' => 'Id Propiedad',
            'txt_nombre' => 'Nombre',
            'txt_correo' => 'Correo',
            'txt_telefono' => 'Teléfono',
            'fch_creacion' => 'Fch Creacion',
            'txt_descripcion' => 'Notas',
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
