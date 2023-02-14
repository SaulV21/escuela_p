<?php

namespace frontend\models;

use Yii;
use backend\models\Matriculas;

/**
 * This is the model class for table "asistencia".
 *
 * @property string $ALUMNO
 * @property string $CURSO
 * @property int $MATRICULA
 * @property string $fecha
 * @property string|null $asiste
 *
 * @property Matriculas $mATRICULA
 */
class Asistencia extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'asistencia';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ALUMNO', 'CURSO', 'MATRICULA', 'fecha'], 'required'],
            [['MATRICULA'], 'integer'],
            [['fecha'], 'safe'],
            [['ALUMNO'], 'string', 'max' => 50],
            [['CURSO'], 'string', 'max' => 45],
            [['asiste'], 'string', 'max' => 5],
            [['ALUMNO', 'CURSO'], 'unique', 'targetAttribute' => ['ALUMNO', 'CURSO']],
            [['MATRICULA'], 'exist', 'skipOnError' => true, 'targetClass' => Matriculas::class, 'targetAttribute' => ['MATRICULA' => 'NUMEROMATRICULA']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ALUMNO' => 'Alumno',
            'CURSO' => 'Curso',
            'MATRICULA' => 'Matricula',
            'fecha' => 'Fecha',
            'asiste' => 'Asiste',
        ];
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
