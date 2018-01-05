<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "empresas".
 *
 * @property integer $id_empresa
 * @property string $txt_nombre
 * @property string $txt_rfc
 * @property string $txt_direccion
 * @property string $txt_persona_contacto
 * @property string $txt_telefono
 * @property string $txt_correo
 * @property string $txt_cp
 * @property integer $id_municipio
 * @property integer $id_estado
 * @property integer $id_pais
 * @property integer $b_habilitado
 * @property string $txt_calle
 * @property string $txt_num_exterior
 * @property string $txt_num_interior
 * @property integer $id_colonia
 * @property double $num_lat
 * @property double $num_long
 * @property string $fch_creacion
 * @property integer $id_ciudad
 *
 * @property CatCiudades $idCiudad
 * @property CatColonias $idColonia
 * @property CatEstados $idEstado
 * @property CatMunicipios $idMunicipio
 * @property CatPais $idPais
 * @property Usuarios[] $usuarios
 */
class Empresas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'empresas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['txt_nombre', 'txt_rfc', 'txt_direccion', 'txt_persona_contacto', 'txt_telefono', 'txt_correo', 'txt_cp', 'id_municipio', 'id_estado', 'id_pais', 'txt_calle', 'txt_num_exterior', 'id_colonia', 'num_lat', 'num_long', 'id_ciudad'], 'required'],
            [['id_municipio', 'id_estado', 'id_pais', 'b_habilitado', 'id_colonia', 'id_ciudad'], 'integer'],
            [['num_lat', 'num_long'], 'number'],
            [['txt_rfc'], 'string', 'min' => 12],
            ['txt_rfc', 'match', 'pattern' => '/^([A-Z,Ñ,&,a-z,ñ]{3,4}([0-9]{2})(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1])[A-Z,a-z|\d]{3})$/'],
            [['fch_creacion'], 'safe'],
            [['txt_nombre', 'txt_rfc', 'txt_direccion', 'txt_persona_contacto', 'txt_telefono', 'txt_correo', 'txt_cp', 'txt_calle', 'txt_num_exterior', 'txt_num_interior'], 'string', 'max' => 45],
            [['txt_rfc'], 'unique'],
            [['id_ciudad'], 'exist', 'skipOnError' => true, 'targetClass' => CatCiudades::className(), 'targetAttribute' => ['id_ciudad' => 'id_ciudad']],
            [['id_colonia'], 'exist', 'skipOnError' => true, 'targetClass' => CatColonias::className(), 'targetAttribute' => ['id_colonia' => 'id_colonia']],
            [['id_estado'], 'exist', 'skipOnError' => true, 'targetClass' => CatEstados::className(), 'targetAttribute' => ['id_estado' => 'id_estado']],
            [['id_municipio'], 'exist', 'skipOnError' => true, 'targetClass' => CatMunicipios::className(), 'targetAttribute' => ['id_municipio' => 'id_municipio']],
            [['id_pais'], 'exist', 'skipOnError' => true, 'targetClass' => CatPaises::className(), 'targetAttribute' => ['id_pais' => 'id_pais']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_empresa' => 'Id Empresa',
            'txt_nombre' => 'Nombre de la empresa',
            'txt_rfc' => 'RFC de la empresa',
            'txt_direccion' => 'Dirección fiscal de la empresa',
            'txt_persona_contacto' => 'Persona Contacto',
            'txt_telefono' => 'Teléfono de contacto',
            'txt_correo' => 'Correo de contacto',
            'txt_cp' => 'Txt CP',
            'id_municipio' => 'Municipio',
            'id_estado' => 'Estado',
            'id_pais' => 'Pais',
            'b_habilitado' => 'B Habilitado',
            'txt_calle' => 'Calle',
            'txt_num_exterior' => 'Núm. exterior',
            'txt_num_interior' => 'Núm. interior',
            'id_colonia' => 'Colonia',
            'num_lat' => 'Num Lat',
            'num_long' => 'Num Long',
            'fch_creacion' => 'Fch Creacion',
            'id_ciudad' => 'Ciudad',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdCiudad()
    {
        return $this->hasOne(CatCiudades::className(), ['id_ciudad' => 'id_ciudad']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdColonia()
    {
        return $this->hasOne(CatColonias::className(), ['id_colonia' => 'id_colonia']);
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
    public function getIdMunicipio()
    {
        return $this->hasOne(CatMunicipios::className(), ['id_municipio' => 'id_municipio']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPais()
    {
        return $this->hasOne(CatPais::className(), ['id_pais' => 'id_pais']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarios()
    {
        return $this->hasMany(Usuarios::className(), ['id_empresa' => 'id_empresa']);
    }
}
