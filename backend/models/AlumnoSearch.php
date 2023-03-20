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
            [['ALUMNO', 'globalSearch', 'CEDULA', 'NOMBRES', 'APELLIDOS', 'FECHA_NACIMIENTO', 'CIUDAD_NACIMIENTO', 'SEXO', 'PADRE', 'PROFESION_PADRE', 'MADRE', 'PROFESION_MADRE', 'CIUDADRES', 'DIRECCION', 'TELEFONO', 'CONTACTO', 'REFERENCIA', 'CORREO', 'FOTO', 'SISRES', 'SISFECHA', 'CSLTKO'], 'safe'],
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
        $query->orFilterWhere([
            'FECHA_NACIMIENTO' => $this->globalSearch,
            'SISFECHA' => $this->globalSearch,
        ]);

        $query->orFilterWhere(['like', 'ALUMNO', $this->globalSearch])
            ->orFilterWhere(['like', 'CEDULA', $this->globalSearch])
            ->orFilterWhere(['like', 'NOMBRES', $this->globalSearch])
            ->orFilterWhere(['like', 'APELLIDOS', $this->globalSearch])
            ->orFilterWhere(['like', 'CIUDAD_NACIMIENTO', $this->globalSearch])
            ->orFilterWhere(['like', 'SEXO', $this->globalSearch])
            ->orFilterWhere(['like', 'PADRE', $this->globalSearch])
            ->orFilterWhere(['like', 'PROFESION_PADRE', $this->globalSearch])
            ->orFilterWhere(['like', 'MADRE', $this->globalSearch])
            ->orFilterWhere(['like', 'PROFESION_MADRE', $this->globalSearch])
            ->orFilterWhere(['like', 'CIUDADRES', $this->globalSearch])
            ->orFilterWhere(['like', 'DIRECCION', $this->globalSearch])
            ->orFilterWhere(['like', 'TELEFONO', $this->globalSearch])
            ->orFilterWhere(['like', 'CONTACTO', $this->globalSearch])
            ->orFilterWhere(['like', 'REFERENCIA', $this->globalSearch])
            ->orFilterWhere(['like', 'CORREO', $this->globalSearch])
            ->orFilterWhere(['like', 'FOTO', $this->globalSearch])
            ->orFilterWhere(['like', 'SISRES', $this->globalSearch])
            ->orFilterWhere(['like', 'CSLTKO', $this->globalSearch]);

        return $dataProvider;
    }
}
