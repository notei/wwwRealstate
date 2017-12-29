<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usuarios".
 *
 * @property integer $id_usuario
 * @property integer $id_tipo_usuario
 * @property string $txt_correo
 * @property string $txt_password
 * @property integer $id_empresa
 * @property integer $b_administrador
 * @property integer $b_habilitado
 * @property string $txt_authkey
 *
 * @property Propiedades[] $propiedades
 * @property Empresas $idEmpresa
 * @property CatTiposUsuarios $idTipoUsuario
 */
class Usuarios extends \yii\db\ActiveRecord implements  \yii\web\IdentityInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'usuarios';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_usuario', 'id_tipo_usuario', 'txt_correo', 'txt_password', 'txt_authkey'], 'required'],
            [['id_usuario', 'id_tipo_usuario', 'id_empresa', 'b_administrador', 'b_habilitado'], 'integer'],
            [['txt_correo', 'txt_password', 'txt_authkey'], 'string', 'max' => 45],
            [['id_empresa'], 'exist', 'skipOnError' => true, 'targetClass' => Empresas::className(), 'targetAttribute' => ['id_empresa' => 'id_empresa']],
            [['id_tipo_usuario'], 'exist', 'skipOnError' => true, 'targetClass' => CatTiposUsuarios::className(), 'targetAttribute' => ['id_tipo_usuario' => 'id_tipo_usuario']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_usuario' => 'Id Usuario',
            'id_tipo_usuario' => 'Id Tipo Usuario',
            'txt_correo' => 'Txt Correo',
            'txt_password' => 'Txt Password',
            'id_empresa' => 'Id Empresa',
            'b_administrador' => 'B Administrador',
            'b_habilitado' => 'B Habilitado',
            'txt_authkey' => 'Txt Authkey',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPropiedades()
    {
        return $this->hasMany(Propiedades::className(), ['id_usuario' => 'id_usuario']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdEmpresa()
    {
        return $this->hasOne(Empresas::className(), ['id_empresa' => 'id_empresa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdTipoUsuario()
    {
        return $this->hasOne(CatTiposUsuarios::className(), ['id_tipo_usuario' => 'id_tipo_usuario']);
    }




     /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->id_usuario;
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->txt_authkey;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->txt_authkey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->txt_password === $password;
    }

    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return self::findOne($id);
        //return isset(self::$users[$id]) ? new static(self::$users[$id]) : null;
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw \yii\base\NotSupportedException();
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return self::findOne(['txt_correo'=>$username]);
    }
}
