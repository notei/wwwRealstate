<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cat_estados_propiedades".
 *
 * @property integer $id_estado_propiedad
 * @property string $txt_nombre
 * @property integer $b_publicar
 * @property integer $b_habilitado
 *
 * @property Propiedades[] $propiedades
 */
class CatEstadosPropiedades extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cat_estados_propiedades';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_estado_propiedad', 'txt_nombre'], 'required'],
            [['id_estado_propiedad', 'b_publicar', 'b_habilitado'], 'integer'],
            [['txt_nombre'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_estado_propiedad' => 'Id Estado Propiedad',
            'txt_nombre' => 'Txt Nombre',
            'b_publicar' => 'B Publicar',
            'b_habilitado' => 'B Habilitado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPropiedades()
    {
        return $this->hasMany(Propiedades::className(), ['id_estado_propiedad' => 'id_estado_propiedad']);
    }
}
