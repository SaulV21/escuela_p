<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Materias;

/**
 * MateriaSearch represents the model behind the search form of `backend\models\Materias`.
 */
class MateriaSearch extends Materias
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['MATERIA', 'NOMBRE', 'DESCRIPCION', 'NIVEL', 'TIPO', 'ABREVIATURA', 'AREA'], 'safe'],
            [['HORAS', 'PRIORIDAD'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Materias::find();

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
            'HORAS' => $this->HORAS,
            'PRIORIDAD' => $this->PRIORIDAD,
        ]);

        $query->andFilterWhere(['like', 'MATERIA', $this->MATERIA])
            ->andFilterWhere(['like', 'NOMBRE', $this->NOMBRE])
            ->andFilterWhere(['like', 'DESCRIPCION', $this->DESCRIPCION])
            ->andFilterWhere(['like', 'NIVEL', $this->NIVEL])
            ->andFilterWhere(['like', 'TIPO', $this->TIPO])
            ->andFilterWhere(['like', 'ABREVIATURA', $this->ABREVIATURA])
            ->andFilterWhere(['like', 'AREA', $this->AREA]);

        return $dataProvider;
    }
}
