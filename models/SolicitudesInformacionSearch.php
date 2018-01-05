<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\SolicitudesInformacion;

/**
 * SolicitudesInformacionSearch represents the model behind the search form about `app\models\SolicitudesInformacion`.
 */
class SolicitudesInformacionSearch extends SolicitudesInformacion
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_solicitud_informacion', 'id_propiedad'], 'integer'],
            [['txt_nombre', 'txt_correo', 'txt_telefono', 'fch_creacion', 'txt_descripcion'], 'safe'],
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
        $query = SolicitudesInformacion::find();

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
            'id_solicitud_informacion' => $this->id_solicitud_informacion,
            'id_propiedad' => $this->id_propiedad,
            'fch_creacion' => $this->fch_creacion,
        ]);

        $query->andFilterWhere(['like', 'txt_nombre', $this->txt_nombre])
            ->andFilterWhere(['like', 'txt_correo', $this->txt_correo])
            ->andFilterWhere(['like', 'txt_telefono', $this->txt_telefono])
            ->andFilterWhere(['like', 'txt_descripcion', $this->txt_descripcion]);

        return $dataProvider;
    }
}
