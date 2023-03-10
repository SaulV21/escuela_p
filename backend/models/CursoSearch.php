<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Cursos;

/**
 * CursoSearch represents the model behind the search form of `backend\models\Cursos`.
 */
class CursoSearch extends Cursos
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['CURSO', 'CUPO', 'INICIAL', 'CICLO', 'ESPECIALIDAD', 'DESCRIPCION', 'PROMOVIDO'], 'safe'],
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
        $query = Cursos::find();

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
        $query->andFilterWhere(['like', 'CURSO', $this->CURSO])
            ->andFilterWhere(['like', 'CUPO', $this->CUPO])
            ->andFilterWhere(['like', 'INICIAL', $this->INICIAL])
            ->andFilterWhere(['like', 'CICLO', $this->CICLO])
            ->andFilterWhere(['like', 'ESPECIALIDAD', $this->ESPECIALIDAD])
            ->andFilterWhere(['like', 'DESCRIPCION', $this->DESCRIPCION])
            ->andFilterWhere(['like', 'PROMOVIDO', $this->PROMOVIDO]);

        return $dataProvider;
    }
}
