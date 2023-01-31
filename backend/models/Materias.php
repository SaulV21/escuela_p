<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "materias".
 *
 * @property string $MATERIA
 * @property string|null $NOMBRE
 * @property string|null $DESCRIPCION
 * @property int|null $HORAS
 * @property string|null $NIVEL
 * @property string $TIPO
 * @property string $ABREVIATURA
 * @property int $PRIORIDAD
 * @property string $AREA
 *
 * @property Matriculas[] $mATRICULAs
 * @property Matriculas[] $mATRICULAs0
 * @property Materiasxcurso[] $materiasxcursos
 * @property MatriculaDetalle[] $matriculaDetalles
 * @property Notasql[] $notasqls
 * @property Parcial[] $parcials
 * @property Quimestres[] $quimestres
 */
class Materias extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'materias';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['MATERIA', 'ABREVIATURA', 'AREA'], 'required'],
            [['HORAS', 'PRIORIDAD'], 'integer'],
            [['MATERIA', 'NOMBRE', 'NIVEL', 'TIPO'], 'string', 'max' => 45],
            [['DESCRIPCION'], 'string', 'max' => 200],
            [['ABREVIATURA'], 'string', 'max' => 5],
            [['AREA'], 'string', 'max' => 300],
            [['MATERIA'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'MATERIA' => 'Materia',
            'NOMBRE' => 'Nombre',
            'DESCRIPCION' => 'Descripcion',
            'HORAS' => 'Horas',
            'NIVEL' => 'Nivel',
            'TIPO' => 'Tipo',
            'ABREVIATURA' => 'Abreviatura',
            'PRIORIDAD' => 'Prioridad',
            'AREA' => 'Area',
        ];
    }

    /**
     * Gets query for [[MATRICULAs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMATRICULAs()
    {
        return $this->hasMany(Matriculas::class, ['NUMEROMATRICULA' => 'MATRICULA'])->viaTable('matricula_detalle', ['MATERIA' => 'MATERIA']);
    }

    /**
     * Gets query for [[MATRICULAs0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMATRICULAs0()
    {
        return $this->hasMany(Matriculas::class, ['NUMEROMATRICULA' => 'MATRICULA'])->viaTable('notasql', ['MATERIA' => 'MATERIA']);
    }

    /**
     * Gets query for [[Materiasxcursos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMateriasxcursos()
    {
        return $this->hasMany(Materiasxcurso::class, ['MATERIA' => 'MATERIA']);
    }

    /**
     * Gets query for [[MatriculaDetalles]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMatriculaDetalles()
    {
        return $this->hasMany(MatriculaDetalle::class, ['MATERIA' => 'MATERIA']);
    }

    /**
     * Gets query for [[Notasqls]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNotasqls()
    {
        return $this->hasMany(Notasql::class, ['MATERIA' => 'MATERIA']);
    }

    /**
     * Gets query for [[Parcials]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getParcials()
    {
        return $this->hasMany(Parcial::class, ['MATERIA' => 'MATERIA']);
    }

    /**
     * Gets query for [[Quimestres]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getQuimestres()
    {
        return $this->hasMany(Quimestres::class, ['MATERIA' => 'MATERIA']);
    }
}
