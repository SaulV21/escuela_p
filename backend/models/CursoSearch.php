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
    public $globalSearch;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['CURSO', 'globalSearch', 'CUPO', 'INICIAL', 'CICLO', 'ESPECIALIDAD', 'DESCRIPCION', 'PROMOVIDO'], 'safe'],
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
        $query->orFilterWhere(['like', 'CURSO', $this->globalSearch])
            ->orFilterWhere(['like', 'CUPO', $this->globalSearch])
            ->orFilterWhere(['like', 'INICIAL', $this->globalSearch])
            ->orFilterWhere(['like', 'CICLO', $this->globalSearch])
            ->orFilterWhere(['like', 'ESPECIALIDAD', $this->globalSearch])
            ->orFilterWhere(['like', 'DESCRIPCION', $this->globalSearch])
            ->orFilterWhere(['like', 'PROMOVIDO', $this->globalSearch]);

        return $dataProvider;
    }
}
