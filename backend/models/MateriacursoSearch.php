<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\MateriaCurso;

/**
 * MateriacursoSearch represents the model behind the search form of `backend\models\MateriaCurso`.
 */
class MateriacursoSearch extends MateriaCurso
{
    public $globalSearch;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['CURSO', 'globalSearch', 'MATERIA', 'PROFESOR', 'PERIODO'], 'safe'],
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
        $query = MateriaCurso::find();

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
        $query->orFilterWhere(['like', 'P.NOMBRES', $this->globalSearch])
        ->innerJoin('profesores P', 'P.PROFESOR = materiasxcurso.PROFESOR')
        ->innerJoin('materias M', 'M.MATERIA= materiasxcurso.MATERIA')
        ->orFilterWhere(['like', 'materiasxcurso.CURSO', $this->globalSearch])
        ->orFilterWhere(['like', 'M.NOMBRE', $this->globalSearch])
        ->orFilterWhere(['like', 'materiasxcurso.PERIODO', $this->globalSearch]);

        return $dataProvider;
    }
}
