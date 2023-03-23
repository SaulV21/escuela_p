<?php

namespace frontend\models;

use Yii;
use backend\models\Matriculas;
use backend\models\Materias;
/**
 * This is the model class for table "matricula_detalle".
 *
 * @property int $MATRICULA
 * @property string $MATERIA
 * @property float|null $QUIM1
 * @property float|null $QUIM2
 * @property float $TOTAL
 * @property float $PROMF
 * @property string $EQUIV
 * @property float $SUM_TOT
 * @property float $PROM_GE
 * @property float|null $SUPLETORIO
 * @property float|null $REMEDIAL
 * @property float|null $GRACIA
 * @property string|null $PROMOCION APRUEBA REPRUEBA
 *
 * @property Materias $mATERIA
 * @property Matriculas $mATRICULA
 */
class Notas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'matricula_detalle';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['MATRICULA', 'MATERIA', 'EQUIV', 'SUM_TOT', 'PROM_GE'], 'required'],
            [['MATRICULA'], 'integer'],
            [['QUIM1', 'QUIM2', 'TOTAL', 'PROMF', 'SUM_TOT', 'PROM_GE', 'SUPLETORIO', 'REMEDIAL', 'GRACIA'], 'number'],
            [['MATERIA', 'PROMOCION'], 'string', 'max' => 45],
            [['EQUIV'], 'string', 'max' => 50],
            [['MATRICULA', 'MATERIA'], 'unique', 'targetAttribute' => ['MATRICULA', 'MATERIA']],
            [['MATRICULA'], 'exist', 'skipOnError' => true, 'targetClass' => Matriculas::class, 'targetAttribute' => ['MATRICULA' => 'NUMEROMATRICULA']],
            [['MATERIA'], 'exist', 'skipOnError' => true, 'targetClass' => Materias::class, 'targetAttribute' => ['MATERIA' => 'MATERIA']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'MATRICULA' => 'Matricula',
            'MATERIA' => 'Materia',
            'QUIM1' => 'Quimestre 1',
            'QUIM2' => 'Quimestre 2',
            'TOTAL' => 'Total',
            'PROMF' => 'Promedio Final',
            'EQUIV' => 'Equivalencia',
            'SUM_TOT' => 'Suma Total',
            'PROM_GE' => 'Promedio General',
            'SUPLETORIO' => 'Supletorio',
            'REMEDIAL' => 'Remedial',
            'GRACIA' => 'Gracia',
            'PROMOCION' => 'Promocion',
        ];
    }

    /**
     * Gets query for [[MATERIA]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMATERIA()
    {
        return $this->hasOne(Materias::class, ['MATERIA' => 'MATERIA']);
    }

    /**
     * Gets query for [[MATRICULA]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMATRICULA()
    {
        return $this->hasOne(Matriculas::class, ['NUMEROMATRICULA' => 'MATRICULA']);
    }
}
