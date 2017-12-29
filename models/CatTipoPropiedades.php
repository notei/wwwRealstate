<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cat_tipo_propiedades".
 *
 * @property integer $id_tipo_propiedad
 * @property string $txt_nombre
 * @property integer $b_habilitado
 *
 * @property Propiedades[] $propiedades
 */
class CatTipoPropiedades extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cat_tipo_propiedades';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_tipo_propiedad'], 'required'],
            [['id_tipo_propiedad', 'b_habilitado'], 'integer'],
            [['txt_nombre'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_tipo_propiedad' => 'Id Tipo Propiedad',
            'txt_nombre' => 'Txt Nombre',
            'b_habilitado' => 'B Habilitado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPropiedades()
    {
        return $this->hasMany(Propiedades::className(), ['id_tipo_propiedad' => 'id_tipo_propiedad']);
    }
}
