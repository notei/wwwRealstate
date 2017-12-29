<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Propiedades;

/**
 * PropiedadesSearch represents the model behind the search form about `app\models\Propiedades`.
 */
class PropiedadesSearch extends Propiedades
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_propiedad', 'id_tipo_propiedad', 'id_persona_contacto', 'id_estado_propiedad', 'id_usuario', 'b_publicada'], 'integer'],
            [['fch_publicacion', 'fch_venta'], 'safe'],
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
        $query = Propiedades::find();

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
            'id_tipo_propiedad' => $this->id_tipo_propiedad,
            'id_persona_contacto' => $this->id_persona_contacto,
            'id_estado_propiedad' => $this->id_estado_propiedad,
            'fch_publicacion' => $this->fch_publicacion,
            'fch_venta' => $this->fch_venta,
            'id_usuario' => $this->id_usuario,
            'b_publicada' => $this->b_publicada,
        ]);

        return $dataProvider;
    }
}
