<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Notas;

/**
 * NotasSearch represents the model behind the search form of `frontend\models\Notas`.
 */
class NotasSearch extends Notas
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['MATRICULA'], 'integer'],
            [['MATERIA', 'EQUIV', 'PROMOCION'], 'safe'],
            [['QUIM1', 'QUIM2', 'TOTAL', 'PROMF', 'SUM_TOT', 'PROM_GE', 'SUPLETORIO', 'REMEDIAL', 'GRACIA'], 'number'],
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
        $query = Notas::find();

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
            'MATRICULA' => $this->MATRICULA,
            'QUIM1' => $this->QUIM1,
            'QUIM2' => $this->QUIM2,
            'TOTAL' => $this->TOTAL,
            'PROMF' => $this->PROMF,
            'SUM_TOT' => $this->SUM_TOT,
            'PROM_GE' => $this->PROM_GE,
            'SUPLETORIO' => $this->SUPLETORIO,
            'REMEDIAL' => $this->REMEDIAL,
            'GRACIA' => $this->GRACIA,
        ]);

        $query->andFilterWhere(['like', 'MATERIA', $this->MATERIA])
            ->andFilterWhere(['like', 'EQUIV', $this->EQUIV])
            ->andFilterWhere(['like', 'PROMOCION', $this->PROMOCION]);

        return $dataProvider;
    }
}
