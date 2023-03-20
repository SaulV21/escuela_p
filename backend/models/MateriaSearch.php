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
    public $globalSearch;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['MATERIA', 'globalSearch', 'NOMBRE', 'DESCRIPCION', 'NIVEL', 'TIPO', 'ABREVIATURA', 'AREA'], 'safe'],
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
        $query->orFilterWhere([
            'HORAS' => $this->globalSearch,
            'PRIORIDAD' => $this->globalSearch,
        ]);

        $query->orFilterWhere(['like', 'MATERIA', $this->globalSearch])
            ->orFilterWhere(['like', 'NOMBRE', $this->globalSearch])
            ->orFilterWhere(['like', 'DESCRIPCION', $this->globalSearch])
            ->orFilterWhere(['like', 'NIVEL', $this->globalSearch])
            ->orFilterWhere(['like', 'TIPO', $this->globalSearch])
            ->orFilterWhere(['like', 'ABREVIATURA', $this->globalSearch])
            ->orFilterWhere(['like', 'AREA', $this->globalSearch]);

        return $dataProvider;
    }
}
