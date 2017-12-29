<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Direcciones;

/**
 * DireccionesSearch represents the model behind the search form about `app\models\Direcciones`.
 */
class DireccionesSearch extends Direcciones
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_direccion', 'id_propiedad', 'id_municipio'], 'integer'],
            [['num_cp', 'txt_calle', 'txt_num_exterior', 'txt_num_interior', 'txt_colonia', 'txt_token'], 'safe'],
            [['num_lat', 'num_lon'], 'number'],
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
        $query = Direcciones::find();

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
            'id_direccion' => $this->id_direccion,
            'id_propiedad' => $this->id_propiedad,
            'id_municipio' => $this->id_municipio,
            'num_lat' => $this->num_lat,
            'num_lon' => $this->num_lon,
        ]);

        $query->andFilterWhere(['like', 'num_cp', $this->num_cp])
            ->andFilterWhere(['like', 'txt_calle', $this->txt_calle])
            ->andFilterWhere(['like', 'txt_num_exterior', $this->txt_num_exterior])
            ->andFilterWhere(['like', 'txt_num_interior', $this->txt_num_interior])
            ->andFilterWhere(['like', 'txt_colonia', $this->txt_colonia])
            ->andFilterWhere(['like', 'txt_token', $this->txt_token]);

        return $dataProvider;
    }
}
