<?php

namespace frontend\models;

use Yii;
use backend\models\Materias;
use backend\models\Matriculas;
use yii\db\Query;
/**
 * This is the model class for table "notasql".
 *
 * @property int $MATRICULA
 * @property string $MATERIA
 * @property string|null $P1Q1
 * @property string|null $P2Q1
 * @property string|null $EQUIV80
 * @property string|null $EV_QUIM
 * @property string|null $EQUIV20
 * @property string|null $PROM_QUI
 * @property string|null $EQ_CUAL
 * @property string|null $COMP
 * @property string|null $NF
 *
 * @property Materias $mATERIA
 * @property Matriculas $mATRICULA
 */
class Notasql extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'notasql';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['MATRICULA', 'MATERIA'], 'required'],
            [['MATRICULA'], 'integer'],
            [['MATERIA'], 'string', 'max' => 45],
            [['P1Q1', 'P2Q1', 'EQUIV80', 'EV_QUIM', 'EQUIV20', 'PROM_QUI', 'EQ_CUAL', 'COMP', 'NF'], 'string', 'max' => 10],
            [['MATRICULA', 'MATERIA'], 'unique', 'targetAttribute' => ['MATRICULA', 'MATERIA']],
            [['MATERIA'], 'exist', 'skipOnError' => true, 'targetClass' => Materias::class, 'targetAttribute' => ['MATERIA' => 'MATERIA']],
            [['MATRICULA'], 'exist', 'skipOnError' => true, 'targetClass' => Matriculas::class, 'targetAttribute' => ['MATRICULA' => 'NUMEROMATRICULA']],
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
            'P1Q1' => 'Primer Parcial',
            'P2Q1' => 'Segundo Parcial',
            'EQUIV80' => 'Equivalencia 80%',
            'EV_QUIM' => 'Evaluacion Quimestral',
            'EQUIV20' => 'Equivalencia 20%',
            'PROM_QUI' => 'Promedio Quimestre',
            'EQ_CUAL' => 'Rendimiento Academico',
            'COMP' => 'Comportamiento',
            'NF' => 'Total',
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

    public function getNOMBRES(){
        $result=Yii::$app->db->createCommand('SELECT A.NOMBRES, A.APELLIDOS FROM ALUMNOS A, MATRICULAS M, notasql N WHERE M.ALUMNO=A.ALUMNO AND
        N.MATRICULA=M.NUMEROMATRICULA')->queryAll();
        return $result;
    }
}
