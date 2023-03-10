<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "periodos".
 *
 * @property string $PERIODO
 * @property string|null $Fecha_ini_periodo
 * @property string|null $Fecha_fin_periodo
 * @property string|null $estado
 * @property string $rector
 * @property string $secretario
 *
 * @property Matriculas[] $matriculas
 */
class Periodo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'periodos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['PERIODO'], 'required', 'message' => 'Debe ingresar el año lectivo. Ejemplo: 2023-2024'],
            [['rector'], 'required', 'message' =>'Debe ingresar los nombres del Rector'],
            [['secretario'], 'required', 'message' =>'Debe ingresar los nombres del Secretario'],
            [['Fecha_ini_periodo', 'Fecha_fin_periodo'], 'safe'],
            [['PERIODO', 'estado'], 'string', 'max' => 45],
            [['rector', 'secretario'], 'string', 'max' => 150],
            [['PERIODO'], 'unique'],
            [['Fecha_fin_periodo'], 'compare', 'compareAttribute' => 'Fecha_ini_periodo', 'operator' => '>=',
            'message' => 'La fecha de finalización del periodo no puede ser anterior a la fecha de inicio'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'PERIODO' => 'Periodo',
            'Fecha_ini_periodo' => 'Fecha Inicio del Periodo',
            'Fecha_fin_periodo' => 'Fecha Fin del Periodo',
            'estado' => 'Estado',
            'rector' => 'Rector',
            'secretario' => 'Secretario',
        ];
    }

    /**
     * Gets query for [[Matriculas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMatriculas()
    {
        return $this->hasMany(Matriculas::class, ['PERIODO' => 'PERIODO']);
    }
}
