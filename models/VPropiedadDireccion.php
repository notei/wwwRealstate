<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "v_propiedad_direccion".
 *
 * @property integer $id_propiedad
 * @property integer $id_tipo_propiedad
 * @property integer $id_persona_contacto
 * @property integer $id_estado_propiedad
 * @property string $fch_publicacion
 * @property string $fch_venta
 * @property integer $id_usuario
 * @property integer $b_publicada
 * @property integer $b_pausada
 * @property string $txt_token
 * @property double $num_precio
 * @property double $num_metros
 * @property integer $b_mostrar_direccion
 * @property integer $id_direccion
 * @property integer $id_municipio
 * @property string $num_cp
 * @property double $num_lat
 * @property double $num_lon
 * @property string $txt_calle
 * @property string $txt_num_exterior
 * @property string $txt_num_interior
 * @property string $txt_colonia
 * @property string $txt_token_dir
 */
class VPropiedadDireccion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'v_propiedad_direccion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_propiedad', 'id_tipo_propiedad', 'id_persona_contacto', 'id_estado_propiedad', 'id_usuario', 'b_publicada', 'b_pausada', 'b_mostrar_direccion', 'id_direccion', 'id_municipio'], 'integer'],
            [['id_tipo_propiedad', 'id_persona_contacto', 'id_estado_propiedad', 'id_usuario', 'txt_token', 'num_precio', 'num_metros', 'id_municipio', 'num_cp', 'num_lat', 'num_lon', 'txt_calle', 'txt_num_exterior', 'txt_colonia'], 'required'],
            [['fch_publicacion', 'fch_venta'], 'safe'],
            [['num_precio', 'num_metros', 'num_lat', 'num_lon'], 'number'],
            [['txt_token', 'txt_calle', 'txt_num_exterior', 'txt_num_interior', 'txt_colonia', 'txt_token_dir'], 'string', 'max' => 45],
            [['num_cp'], 'string', 'max' => 5],
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
            'b_pausada' => 'B Pausada',
            'txt_token' => 'Txt Token',
            'num_precio' => 'Num Precio',
            'num_metros' => 'Num Metros',
            'b_mostrar_direccion' => 'B Mostrar Direccion',
            'id_direccion' => 'Id Direccion',
            'id_municipio' => 'Id Municipio',
            'num_cp' => 'Num Cp',
            'num_lat' => 'Num Lat',
            'num_lon' => 'Num Lon',
            'txt_calle' => 'Txt Calle',
            'txt_num_exterior' => 'Txt Num Exterior',
            'txt_num_interior' => 'Txt Num Interior',
            'txt_colonia' => 'Txt Colonia',
            'txt_token_dir' => 'Txt Token Dir',
        ];
    }
}
