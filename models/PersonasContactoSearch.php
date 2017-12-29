<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PersonasContactos;

/**
 * PersonasContactoSearch represents the model behind the search form about `app\models\PersonasContactos`.
 */
class PersonasContactoSearch extends PersonasContactos
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_persona_contacto'], 'integer'],
            [['txt_nombre', 'txt_token'], 'safe'],
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
        $query = PersonasContactos::find();

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
            'id_persona_contacto' => $this->id_persona_contacto,
        ]);

        $query->andFilterWhere(['like', 'txt_nombre', $this->txt_nombre])
            ->andFilterWhere(['like', 'txt_token', $this->txt_token]);

        return $dataProvider;
    }
}
