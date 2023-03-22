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
    public $globalSearch;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['NUMEROMATRICULA'], 'integer'],
            [['ALUMNO', 'globalSearch', 'PERIODO', 'CURSO', 'CICLO', 'ESPECIALIDAD', 'FECHA', 'OBSERVACION', 'REFERENCIA', 'SYSRES'], 'safe'],
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
        $query->orFilterWhere([
            'MATRICULAS.NUMEROMATRICULA' => $this->globalSearch,
            'MATRICULAS.FECHA' => $this->globalSearch,
        ]);

        $query->orFilterWhere(['like', 'A.NOMBRES', $this->globalSearch])
        ->orFilterWhere(['like', 'A.APELLIDOS', $this->globalSearch])
        ->innerJoin('ALUMNOS A', 'A.ALUMNO = MATRICULAS.ALUMNO')
            ->orFilterWhere(['like', 'MATRICULAS.PERIODO', $this->globalSearch])
            ->orFilterWhere(['like', 'MATRICULAS.CURSO', $this->globalSearch])
            ->orFilterWhere(['like', 'MATRICULAS.CICLO', $this->globalSearch])
            ->orFilterWhere(['like', 'MATRICULAS.ESPECIALIDAD', $this->globalSearch])
            ->orFilterWhere(['like', 'MATRICULAS.OBSERVACION', $this->globalSearch])
            ->orFilterWhere(['like', 'MATRICULAS.REFERENCIA', $this->globalSearch])
            ->orFilterWhere(['like', 'MATRICULAS.SYSRES', $this->globalSearch]);

        return $dataProvider;
    }
}
