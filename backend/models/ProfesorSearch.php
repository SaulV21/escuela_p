<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Profesor;

/**
 * ProfesorSearch represents the model behind the search form of `backend\models\Profesor`.
 */
class ProfesorSearch extends Profesor
{
    public $globalSearch;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['PROFESOR', 'globalSearch', 'CEDULA', 'NOMBRES', 'DESCRIPCION', 'DIRECCION', 'TELEFONO', 'FECHA_NACIMIENTO', 'FOTO', 'CORREO', 'CLAVE', 'HOJAVIDA', 'AREA', 'ESTADO'], 'safe'],
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
        $query = Profesor::find();

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
        ]);

        $query->orFilterWhere(['like', 'PROFESOR', $this->globalSearch])
            ->orFilterWhere(['like', 'CEDULA', $this->globalSearch])
            ->orFilterWhere(['like', 'NOMBRES', $this->globalSearch])
            ->orFilterWhere(['like', 'DESCRIPCION', $this->globalSearch])
            ->orFilterWhere(['like', 'DIRECCION', $this->globalSearch])
            ->orFilterWhere(['like', 'TELEFONO', $this->globalSearch])
            ->orFilterWhere(['like', 'FOTO', $this->globalSearch])
            ->orFilterWhere(['like', 'CORREO', $this->globalSearch])
            ->orFilterWhere(['like', 'CLAVE', $this->globalSearch])
            ->orFilterWhere(['like', 'HOJAVIDA', $this->globalSearch])
            ->orFilterWhere(['like', 'AREA', $this->globalSearch])
            ->orFilterWhere(['like', 'ESTADO', $this->globalSearch]);

        return $dataProvider;
    }
}
