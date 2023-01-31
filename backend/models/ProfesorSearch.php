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
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['PROFESOR', 'CEDULA', 'NOMBRES', 'DESCRIPCION', 'DIRECCION', 'TELEFONO', 'FECHA_NACIMIENTO', 'FOTO', 'CORREO', 'CLAVE', 'HOJAVIDA', 'AREA', 'ESTADO'], 'safe'],
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
        $query->andFilterWhere([
            'FECHA_NACIMIENTO' => $this->FECHA_NACIMIENTO,
        ]);

        $query->andFilterWhere(['like', 'PROFESOR', $this->PROFESOR])
            ->andFilterWhere(['like', 'CEDULA', $this->CEDULA])
            ->andFilterWhere(['like', 'NOMBRES', $this->NOMBRES])
            ->andFilterWhere(['like', 'DESCRIPCION', $this->DESCRIPCION])
            ->andFilterWhere(['like', 'DIRECCION', $this->DIRECCION])
            ->andFilterWhere(['like', 'TELEFONO', $this->TELEFONO])
            ->andFilterWhere(['like', 'FOTO', $this->FOTO])
            ->andFilterWhere(['like', 'CORREO', $this->CORREO])
            ->andFilterWhere(['like', 'CLAVE', $this->CLAVE])
            ->andFilterWhere(['like', 'HOJAVIDA', $this->HOJAVIDA])
            ->andFilterWhere(['like', 'AREA', $this->AREA])
            ->andFilterWhere(['like', 'ESTADO', $this->ESTADO]);

        return $dataProvider;
    }
}
