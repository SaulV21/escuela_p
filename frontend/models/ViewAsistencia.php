<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "view_asistencia".
 *@property int $id
 * @property string $fecha
 * @property string|null $CURSO
 * @property string $ALUMNO
 * @property string|null $NOMBRES
 * @property string|null $APELLIDOS
 * @property string $asistencia
 */
class ViewAsistencia extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'view_asistencia';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'safe'],
            [['fecha'], 'safe'],
            [['ALUMNO'], 'required'],
            [['CURSO'], 'string', 'max' => 45],
            [['ALUMNO'], 'string', 'max' => 50],
            [['NOMBRES', 'APELLIDOS'], 'string', 'max' => 100],
            [['asistencia'], 'string', 'max' => 2],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fecha' => 'Fecha',
            'CURSO' => 'Curso',
            'ALUMNO' => 'Alumno',
            'NOMBRES' => 'Nombres',
            'APELLIDOS' => 'Apellidos',
            'asistencia' => 'Asistencia',
        ];
    }
}
