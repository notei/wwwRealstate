<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Fotografias;

/**
 * FotografiasSearch represents the model behind the search form about `app\models\Fotografias`.
 */
class FotografiasSearch extends Fotografias
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_fotografia', 'id_propiedad', 'b_flaged'], 'integer'],
            [['txt_url'], 'safe'],
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
        $query = Fotografias::find();

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
            'id_fotografia' => $this->id_fotografia,
            'id_propiedad' => $this->id_propiedad,
            'b_flaged' => $this->b_flaged,
        ]);

        $query->andFilterWhere(['like', 'txt_url', $this->txt_url]);

        return $dataProvider;
    }
}
