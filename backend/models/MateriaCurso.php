<?php

namespace backend\models;
use backend\models\Profesor;
use Yii;

/**
 * This is the model class for table "materiasxcurso".
 *
 * @property string $CURSO
 * @property string $MATERIA
 * @property string $PROFESOR
 * @property string $PERIODO
 *
 * @property Cursos $cURSO
 * @property Materias $mATERIA
 * @property Profesor $pROFESOR
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
            [['CURSO', 'MATERIA', 'PROFESOR', 'PERIODO'], 'string', 'max' => 45],
            [['CURSO'],'required', 'message'=> 'Debe elegir un curso'],
            [['MATERIA'],'required', 'message'=> 'Debe elegir una materia'],
            [['PERIODO'],'required', 'message'=> 'Debe elegir un periodo'],
            [['PROFESOR'],'required', 'message'=> 'Debe elegir un profesor'],
            [['CURSO', 'MATERIA', 'PERIODO'], 'unique', 'targetAttribute' => ['CURSO', 'MATERIA', 'PERIODO']],
            [['CURSO'], 'exist', 'skipOnError' => true, 'targetClass' => Cursos::class, 'targetAttribute' => ['CURSO' => 'CURSO']],
            [['MATERIA'], 'exist', 'skipOnError' => true, 'targetClass' => Materias::class, 'targetAttribute' => ['MATERIA' => 'MATERIA']],
            [['PROFESOR'], 'exist', 'skipOnError' => true, 'targetClass' => Profesor::class, 'targetAttribute' => ['PROFESOR' => 'PROFESOR']],
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
        return $this->hasOne(Profesor::class, ['PROFESOR' => 'PROFESOR']);
    }

    //TRAER EL NOMBRE DEL PROFESOR
    public function getNombreProfesor()
    {
        return $this->hasOne(Profesor::className(), ['PROFESOR' => 'PROFESOR']);
    }

}
