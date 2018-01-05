<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cat_tipos_usuarios".
 *
 * @property integer $id_tipo_usuario
 * @property string $txt_nombre
 * @property integer $b_habilitado
 *
 * @property Usuarios[] $usuarios
 */
class CatTiposUsuarios extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cat_tipos_usuarios';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_tipo_usuario', 'b_habilitado'], 'required'],
            [['id_tipo_usuario', 'b_habilitado'], 'integer'],
            [['txt_nombre'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_tipo_usuario' => 'Id Tipo Usuario',
            'txt_nombre' => 'Txt Nombre',
            'b_habilitado' => 'B Habilitado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarios()
    {
        return $this->hasMany(Usuarios::className(), ['id_tipo_usuario' => 'id_tipo_usuario']);
    }
}
