<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Notasql;

/**
 * NotasqlSearch represents the model behind the search form of `frontend\models\Notasql`.
 */
class NotasqlSearch extends Notasql
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['MATRICULA'], 'integer'],
            [['MATERIA', 'P1Q1', 'P2Q1', 'EQUIV80', 'EV_QUIM', 'EQUIV20', 'PROM_QUI', 'EQ_CUAL', 'COMP', 'NF'], 'safe'],
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
        $query = Notasql::find();

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
        ]);

        $query->andFilterWhere(['like', 'MATERIA', $this->MATERIA])
            ->andFilterWhere(['like', 'P1Q1', $this->P1Q1])
            ->andFilterWhere(['like', 'P2Q1', $this->P2Q1])
            ->andFilterWhere(['like', 'EQUIV80', $this->EQUIV80])
            ->andFilterWhere(['like', 'EV_QUIM', $this->EV_QUIM])
            ->andFilterWhere(['like', 'EQUIV20', $this->EQUIV20])
            ->andFilterWhere(['like', 'PROM_QUI', $this->PROM_QUI])
            ->andFilterWhere(['like', 'EQ_CUAL', $this->EQ_CUAL])
            ->andFilterWhere(['like', 'COMP', $this->COMP])
            ->andFilterWhere(['like', 'NF', $this->NF]);

        return $dataProvider;
    }
}
