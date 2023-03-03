<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "cursos".
 *
 * @property string $CURSO
 * @property string|null $CUPO
 * @property string|null $INICIAL
 * @property string|null $CICLO
 * @property string|null $ESPECIALIDAD
 * @property string $DESCRIPCION
 * @property string $PROMOVIDO
 *
 * @property Materiasxcurso[] $materiasxcursos
 * @property Matriculas[] $matriculas
 */
class Cursos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cursos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['CURSO'], 'required', 'message'=>'Debe ingresar las iniciales de un curso. Ejemplo: CUARTO EGB'],
            [['DESCRIPCION'], 'required','message'=>'Debe ingresar la descripcion del curso'],
            [['PROMOVIDO'], 'required','message'=>'Debe ingresar el curso al que haya sido promovido el estudiante'],
            [['CURSO', 'CUPO', 'INICIAL', 'CICLO', 'ESPECIALIDAD'], 'string', 'max' => 45],
            [['DESCRIPCION'], 'string', 'max' => 200],
            [['PROMOVIDO'], 'string', 'max' => 100],
            [['CURSO'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'CURSO' => 'Curso',
            'CUPO' => 'Cupo',
            'INICIAL' => 'Inicial',
            'CICLO' => 'Ciclo',
            'ESPECIALIDAD' => 'Especialidad',
            'DESCRIPCION' => 'Descripción',
            'PROMOVIDO' => 'Promovido',
        ];
    }

    /**
     * Gets query for [[Materiasxcursos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMateriasxcursos()
    {
        return $this->hasMany(Materiasxcurso::class, ['CURSO' => 'CURSO']);
    }

    /**
     * Gets query for [[Matriculas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMatriculas()
    {
        return $this->hasMany(Matriculas::class, ['CURSO' => 'CURSO']);
    }
}
