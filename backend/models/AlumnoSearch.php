<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Alumnos;

/**
 * AlumnoSearch represents the model behind the search form of `backend\models\Alumnos`.
 */
class AlumnoSearch extends Alumnos
{
    public $globalSearch;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ALUMNO', 'globalSearch','CEDULA', 'NOMBRES', 'APELLIDOS', 'FECHA_NACIMIENTO', 'CIUDAD_NACIMIENTO', 'SEXO', 'PADRE', 'PROFESION_PADRE', 'MADRE', 'PROFESION_MADRE', 'CIUDADRES', 'DIRECCION', 'TELEFONO', 'CONTACTO', 'REFERENCIA', 'CORREO', 'FOTO', 'SISRES', 'SISFECHA', 'CSLTKO'], 'safe'],
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
        $query = Alumnos::find();

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
            'FECHA_NACIMIENTO' => $this->FECHA_NACIMIENTO,
            'SISFECHA' => $this->SISFECHA,
        ]);

        $query->andFilterWhere(['like', 'ALUMNO', $this->ALUMNO])
            ->andFilterWhere(['like', 'CEDULA', $this->CEDULA])
            ->andFilterWhere(['like', 'NOMBRES', $this->NOMBRES])
            ->andFilterWhere(['like', 'APELLIDOS', $this->APELLIDOS])
            ->andFilterWhere(['like', 'CIUDAD_NACIMIENTO', $this->CIUDAD_NACIMIENTO])
            ->andFilterWhere(['like', 'SEXO', $this->SEXO])
            ->andFilterWhere(['like', 'PADRE', $this->PADRE])
            ->andFilterWhere(['like', 'PROFESION_PADRE', $this->PROFESION_PADRE])
            ->andFilterWhere(['like', 'MADRE', $this->MADRE])
            ->andFilterWhere(['like', 'PROFESION_MADRE', $this->PROFESION_MADRE])
            ->andFilterWhere(['like', 'CIUDADRES', $this->CIUDADRES])
            ->andFilterWhere(['like', 'DIRECCION', $this->DIRECCION])
            ->andFilterWhere(['like', 'TELEFONO', $this->TELEFONO])
            ->andFilterWhere(['like', 'CONTACTO', $this->CONTACTO])
            ->andFilterWhere(['like', 'REFERENCIA', $this->REFERENCIA])
            ->andFilterWhere(['like', 'CORREO', $this->CORREO])
            ->andFilterWhere(['like', 'FOTO', $this->FOTO])
            ->andFilterWhere(['like', 'SISRES', $this->SISRES])
            ->andFilterWhere(['like', 'CSLTKO', $this->CSLTKO]);

        return $dataProvider;
    }
}
