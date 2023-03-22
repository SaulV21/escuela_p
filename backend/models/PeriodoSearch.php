<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Periodo;

/**
 * PeriodoSearch represents the model behind the search form of `backend\models\Periodo`.
 */
class PeriodoSearch extends Periodo
{
    public $globalSearch;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['PERIODO', 'globalSearch', 'Fecha_ini_periodo', 'Fecha_fin_periodo', 'estado', 'rector', 'secretario'], 'safe'],
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
        $query = Periodo::find();

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
        $query->orFilterWhere([
            'Fecha_ini_periodo' => $this->globalSearch,
            'Fecha_fin_periodo' => $this->globalSearch,
        ]);

        $query->orFilterWhere(['like', 'PERIODO', $this->globalSearch])
            ->orFilterWhere(['like', 'estado', $this->globalSearch])
            ->orFilterWhere(['like', 'rector', $this->globalSearch])
            ->orFilterWhere(['like', 'secretario', $this->globalSearch]);

        return $dataProvider;
    }
}
