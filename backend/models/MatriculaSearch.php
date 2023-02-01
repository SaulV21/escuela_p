<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Matriculas;

/**
 * MatriculaSearch represents the model behind the search form of `backend\models\Matriculas`.
 */
class MatriculaSearch extends Matriculas
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['NUMEROMATRICULA'], 'integer'],
            [['ALUMNO', 'PERIODO', 'CURSO', 'CICLO', 'ESPECIALIDAD', 'FECHA', 'OBSERVACION', 'REFERENCIA', 'SYSRES'], 'safe'],
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
        $query = Matriculas::find();

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
            'NUMEROMATRICULA' => $this->NUMEROMATRICULA,
            'FECHA' => $this->FECHA,
        ]);

        $query->andFilterWhere(['like', 'ALUMNO', $this->ALUMNO])
            ->andFilterWhere(['like', 'PERIODO', $this->PERIODO])
            ->andFilterWhere(['like', 'CURSO', $this->CURSO])
            ->andFilterWhere(['like', 'CICLO', $this->CICLO])
            ->andFilterWhere(['like', 'ESPECIALIDAD', $this->ESPECIALIDAD])
            ->andFilterWhere(['like', 'OBSERVACION', $this->OBSERVACION])
            ->andFilterWhere(['like', 'REFERENCIA', $this->REFERENCIA])
            ->andFilterWhere(['like', 'SYSRES', $this->SYSRES]);

        return $dataProvider;
    }
}
