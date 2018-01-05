<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Usuarios;

/**
 * UsuariosSearch represents the model behind the search form about `app\models\Usuarios`.
 */
class UsuariosSearch extends Usuarios
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_usuario', 'id_tipo_usuario', 'id_empresa', 'b_administrador', 'b_habilitado'], 'integer'],
            [['txt_correo', 'txt_password', 'txt_token', 'fch_registro'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Usuarios::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_usuario' => $this->id_usuario,
            'id_tipo_usuario' => $this->id_tipo_usuario,
            'id_empresa' => $this->id_empresa,
            'b_administrador' => $this->b_administrador,
            'b_habilitado' => $this->b_habilitado,
            'fch_registro' => $this->fch_registro,
        ]);

        $query->andFilterWhere(['like', 'txt_correo', $this->txt_correo])
            ->andFilterWhere(['like', 'txt_password', $this->txt_password])
            ->andFilterWhere(['like', 'txt_token', $this->txt_token]);

        return $dataProvider;
    }
}
