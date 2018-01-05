<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Empresas;

/**
 * EmpresasSearch represents the model behind the search form about `app\models\Empresas`.
 */
class EmpresasSearch extends Empresas
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_empresa', 'b_habilitado'], 'integer'],
            [['txt_nombre', 'txt_rfc', 'txt_direccion', 'txt_persona_contacto', 'txt_telefono', 'txt_correo', 'txt_cp', 'id_municipio', 'id_estado', 'id_pais', 'txt_calle', 'txt_num_exterior', 'txt_num_interior', 'txt_colonia', 'fch_creacion'], 'safe'],
            [['num_lat', 'num_long'], 'number'],
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
        $query = Empresas::find();

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
            'id_empresa' => $this->id_empresa,
            'b_habilitado' => $this->b_habilitado,
            'num_lat' => $this->num_lat,
            'num_long' => $this->num_long,
            'fch_creacion' => $this->fch_creacion,
        ]);

        $query->andFilterWhere(['like', 'txt_nombre', $this->txt_nombre])
            ->andFilterWhere(['like', 'txt_rfc', $this->txt_rfc])
            ->andFilterWhere(['like', 'txt_direccion', $this->txt_direccion])
            ->andFilterWhere(['like', 'txt_persona_contacto', $this->txt_persona_contacto])
            ->andFilterWhere(['like', 'txt_telefono', $this->txt_telefono])
            ->andFilterWhere(['like', 'txt_correo', $this->txt_correo])
            ->andFilterWhere(['like', 'txt_cp', $this->txt_cp])
            ->andFilterWhere(['like', 'id_municipio', $this->id_municipio])
            ->andFilterWhere(['like', 'id_estado', $this->id_estado])
            ->andFilterWhere(['like', 'id_pais', $this->id_pais])
            ->andFilterWhere(['like', 'txt_calle', $this->txt_calle])
            ->andFilterWhere(['like', 'txt_num_exterior', $this->txt_num_exterior])
            ->andFilterWhere(['like', 'txt_num_interior', $this->txt_num_interior])
            ->andFilterWhere(['like', 'txt_colonia', $this->txt_colonia]);

        return $dataProvider;
    }
}
