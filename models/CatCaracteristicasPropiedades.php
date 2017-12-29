<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cat_caracteristicas_propiedades".
 *
 * @property integer $id_caracteristicas_propiedades
 * @property string $txt_nombre
 * @property integer $b_habilitado
 * @property integer $num_orden
 *
 * @property RelPropiedadCaracteristica[] $relPropiedadCaracteristicas
 * @property Propiedades[] $idPropiedads
 */
class CatCaracteristicasPropiedades extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cat_caracteristicas_propiedades';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_caracteristicas_propiedades', 'txt_nombre', 'b_habilitado'], 'required'],
            [['id_caracteristicas_propiedades', 'b_habilitado', 'num_orden'], 'integer'],
            [['txt_nombre'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_caracteristicas_propiedades' => 'Id Caracteristicas Propiedades',
            'txt_nombre' => 'Txt Nombre',
            'b_habilitado' => 'B Habilitado',
            'num_orden' => 'Num Orden',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRelPropiedadCaracteristicas()
    {
        return $this->hasMany(RelPropiedadCaracteristica::className(), ['id_caracteristica_propiedad' => 'id_caracteristicas_propiedades']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPropiedads()
    {
        return $this->hasMany(Propiedades::className(), ['id_propiedad' => 'id_propiedad'])->viaTable('rel_propiedad_caracteristica', ['id_caracteristica_propiedad' => 'id_caracteristicas_propiedades']);
    }
}
