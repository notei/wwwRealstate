<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "propiedades".
 *
 * @property integer $id_propiedad
 * @property integer $id_tipo_propiedad
 * @property integer $id_persona_contacto
 * @property integer $id_estado_propiedad
 * @property string $fch_publicacion
 * @property string $fch_venta
 * @property integer $id_usuario
 * @property integer $b_publicada
 * @property string $fch_publicada
 * @property integer $b_pausada
 * @property string $txt_token
 * @property double $num_precio
 * @property double $num_metros
 * @property integer $b_mostrar_direccion
 * @property string $txt_descripcion
 *
 * @property Direcciones[] $direcciones
 * @property Fotografias[] $fotografias
 * @property CatEstadosPropiedades $idEstadoPropiedad
 * @property PersonasContactos $idPersonaContacto
 * @property CatTipoPropiedades $idTipoPropiedad
 * @property Usuarios $idUsuario
 * @property RelPropiedadCaracteristica[] $relPropiedadCaracteristicas
 * @property CatCaracteristicasPropiedades[] $idCaracteristicaPropiedads
 */
class Propiedades extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'propiedades';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_tipo_propiedad', 'id_persona_contacto', 'id_estado_propiedad', 'id_usuario', 'txt_token', 'num_precio', 'num_metros'], 'required'],
            [['id_tipo_propiedad', 'id_persona_contacto', 'id_estado_propiedad', 'id_usuario', 'b_publicada', 'b_pausada', 'b_mostrar_direccion'], 'integer'],
            [['fch_publicacion', 'fch_venta', 'fch_publicada'], 'safe'],
            [['num_precio', 'num_metros'], 'number'],
            [['txt_descripcion'], 'string'],
            [['txt_token'], 'string', 'max' => 45],
            [['txt_token'], 'unique'],
            [['id_estado_propiedad'], 'exist', 'skipOnError' => true, 'targetClass' => CatEstadosPropiedades::className(), 'targetAttribute' => ['id_estado_propiedad' => 'id_estado_propiedad']],
            [['id_persona_contacto'], 'exist', 'skipOnError' => true, 'targetClass' => PersonasContactos::className(), 'targetAttribute' => ['id_persona_contacto' => 'id_persona_contacto']],
            [['id_tipo_propiedad'], 'exist', 'skipOnError' => true, 'targetClass' => CatTipoPropiedades::className(), 'targetAttribute' => ['id_tipo_propiedad' => 'id_tipo_propiedad']],
            [['id_usuario'], 'exist', 'skipOnError' => true, 'targetClass' => Usuarios::className(), 'targetAttribute' => ['id_usuario' => 'id_usuario']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_propiedad' => 'Id Propiedad',
            'id_tipo_propiedad' => 'Id Tipo Propiedad',
            'id_persona_contacto' => 'Id Persona Contacto',
            'id_estado_propiedad' => 'Id Estado Propiedad',
            'fch_publicacion' => 'Fch Publicacion',
            'fch_venta' => 'Fch Venta',
            'id_usuario' => 'Id Usuario',
            'b_publicada' => 'B Publicada',
            'fch_publicada' => 'Fch Publicada',
            'b_pausada' => 'B Pausada',
            'txt_token' => 'Txt Token',
            'num_precio' => 'Num Precio',
            'num_metros' => 'Num Metros',
            'b_mostrar_direccion' => 'B Mostrar Direccion',
            'txt_descripcion' => 'Txt Descripcion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDirecciones()
    {
        return $this->hasMany(Direcciones::className(), ['id_propiedad' => 'id_propiedad']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFotografias()
    {
        return $this->hasMany(Fotografias::className(), ['id_propiedad' => 'id_propiedad']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdEstadoPropiedad()
    {
        return $this->hasOne(CatEstadosPropiedades::className(), ['id_estado_propiedad' => 'id_estado_propiedad']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPersonaContacto()
    {
        return $this->hasOne(PersonasContactos::className(), ['id_persona_contacto' => 'id_persona_contacto']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdTipoPropiedad()
    {
        return $this->hasOne(CatTipoPropiedades::className(), ['id_tipo_propiedad' => 'id_tipo_propiedad']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdUsuario()
    {
        return $this->hasOne(Usuarios::className(), ['id_usuario' => 'id_usuario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRelPropiedadCaracteristicas()
    {
        return $this->hasMany(RelPropiedadCaracteristica::className(), ['id_propiedad' => 'id_propiedad']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdCaracteristicaPropiedads()
    {
        return $this->hasMany(CatCaracteristicasPropiedades::className(), ['id_caracteristicas_propiedades' => 'id_caracteristica_propiedad'])->viaTable('rel_propiedad_caracteristica', ['id_propiedad' => 'id_propiedad']);
    }
}
