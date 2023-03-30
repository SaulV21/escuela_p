<?php

namespace frontend\models;

use Yii;
use backend\models\Matriculas;
use backend\models\Alumnos;

/**
 * This is the model class for table "asistencia".
 *
 * @property string $ALUMNO
 * @property int $MATRICULA
 * @property string $fecha
 * @property string|null $asiste
 *
 * @property Alumnos $aLUMNO
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
            [['ALUMNO', 'MATRICULA', 'fecha'], 'required'],
            [['MATRICULA'], 'integer'],
            [['fecha'], 'safe'],
            [['ALUMNO'], 'string', 'max' => 50],
            [['asiste'], 'string', 'max' => 2],
            [['ALUMNO', 'MATRICULA', 'fecha'], 'unique', 'targetAttribute' => ['ALUMNO', 'MATRICULA', 'fecha']],
            [['MATRICULA'], 'exist', 'skipOnError' => true, 'targetClass' => Matriculas::class, 'targetAttribute' => ['MATRICULA' => 'NUMEROMATRICULA']],
            [['ALUMNO'], 'exist', 'skipOnError' => true, 'targetClass' => Alumnos::class, 'targetAttribute' => ['ALUMNO' => 'ALUMNO']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ALUMNO' => 'Alumno',
            'MATRICULA' => 'Matricula',
            'fecha' => 'Fecha',
            'asiste' => 'Asiste',
        ];
    }

    /**
     * Gets query for [[ALUMNO]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getALUMNO()
    {
        return $this->hasOne(Alumnos::class, ['ALUMNO' => 'ALUMNO']);
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

    public function beforeSave($insert)
    {
    if (parent::beforeSave($insert)) {
        if ($insert) {
            // Antes de insertar, extraer el ID de la tabla matricula
            $connection = Yii::$app->db;
            $command = $connection->createCommand('SELECT m.numeromatricula FROM matriculas m, asistencia a WHERE m.ALUMNO=:alumno');
            $command->bindValue(':alumno', $this->ALUMNO);
            $ID = $command->queryScalar();
            $this->MATRICULA = $ID;
        }
        return true;
    }
    return false;
    }

//Creamos la relacion con alumnos y el index del controlador
public function getListnombre(){
    return $this->hasOne(Alumnos::className(),['ALUMNO'=>'ALUMNO']);
}
}
