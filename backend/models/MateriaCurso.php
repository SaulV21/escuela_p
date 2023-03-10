<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "materiasxcurso".
 *
 * @property string $CURSO
 * @property string $MATERIA
 * @property string|null $PROFESOR
 * @property string $PERIODO
 *
 * @property Cursos $cURSO
 * @property Materias $mATERIA
 * @property Profesores $pROFESOR
 */
class MateriaCurso extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'materiasxcurso';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['CURSO', 'MATERIA', 'PERIODO'], 'required'],
            [['CURSO', 'MATERIA', 'PROFESOR', 'PERIODO'], 'string', 'max' => 45],
            [['CURSO'], 'message'=> 'Debe elegir un curso'],
            [['MATERIA'], 'string', 'max' => 45],
            [['CURSO', 'MATERIA', 'PROFESOR', 'PERIODO'], 'string', 'max' => 45],
            [['CURSO', 'MATERIA', 'PROFESOR', 'PERIODO'], 'string', 'max' => 45],
            [['CURSO', 'MATERIA', 'PERIODO'], 'unique', 'targetAttribute' => ['CURSO', 'MATERIA', 'PERIODO']],
            [['CURSO'], 'exist', 'skipOnError' => true, 'targetClass' => Cursos::class, 'targetAttribute' => ['CURSO' => 'CURSO']],
            [['MATERIA'], 'exist', 'skipOnError' => true, 'targetClass' => Materias::class, 'targetAttribute' => ['MATERIA' => 'MATERIA']],
            [['PROFESOR'], 'exist', 'skipOnError' => true, 'targetClass' => Profesores::class, 'targetAttribute' => ['PROFESOR' => 'PROFESOR']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'CURSO' => 'Curso',
            'MATERIA' => 'Materia',
            'PROFESOR' => 'Profesor',
            'PERIODO' => 'Periodo',
        ];
    }

    /**
     * Gets query for [[CURSO]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCURSO()
    {
        return $this->hasOne(Cursos::class, ['CURSO' => 'CURSO']);
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
     * Gets query for [[PROFESOR]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPROFESOR()
    {
        return $this->hasOne(Profesores::class, ['PROFESOR' => 'PROFESOR']);
    }
}
