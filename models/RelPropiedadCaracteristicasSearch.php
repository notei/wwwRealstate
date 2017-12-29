<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\RelPropiedadCaracteristica;

/**
 * RelPropiedadCaracteristicasSearch represents the model behind the search form about `app\models\RelPropiedadCaracteristica`.
 */
class RelPropiedadCaracteristicasSearch extends RelPropiedadCaracteristica
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_propiedad', 'id_caracteristica_propiedad'], 'integer'],
            [['txt_valor'], 'safe'],
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
        $query = RelPropiedadCaracteristica::find();

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
            'id_propiedad' => $this->id_propiedad,
            'id_caracteristica_propiedad' => $this->id_caracteristica_propiedad,
        ]);

        $query->andFilterWhere(['like', 'txt_valor', $this->txt_valor]);

        return $dataProvider;
    }
}
