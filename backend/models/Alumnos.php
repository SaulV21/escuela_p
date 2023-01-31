<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "alumnos".
 *
 * @property string $ALUMNO
 * @property string|null $CEDULA
 * @property string|null $NOMBRES
 * @property string|null $APELLIDOS
 * @property string|null $FECHA_NACIMIENTO
 * @property string|null $CIUDAD_NACIMIENTO
 * @property string|null $SEXO
 * @property string|null $PADRE
 * @property string|null $PROFESION_PADRE
 * @property string|null $MADRE
 * @property string|null $PROFESION_MADRE
 * @property string|null $CIUDADRES
 * @property string|null $DIRECCION
 * @property string|null $TELEFONO
 * @property string|null $CONTACTO
 * @property string|null $REFERENCIA
 * @property string|null $CORREO
 * @property resource|null $FOTO
 * @property string|null $SISRES
 * @property string|null $SISFECHA
 * @property string|null $CSLTKO
 *
 * @property Matriculas[] $matriculas
 */
class Alumnos extends \yii\db\ActiveRecord
{
    public $archivo;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'alumnos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ALUMNO'], 'required'],
            [['FECHA_NACIMIENTO', 'SISFECHA'], 'safe'],
            [['DIRECCION', 'FOTO'], 'string'],
            //[['DIRECCION'], 'string'],
            [['archivo'], 'file', 'extensions'=>'jpg, png'],
            [['ALUMNO'], 'string', 'max' => 50],
            [['CEDULA'], 'string', 'max' => 15],
            [['NOMBRES', 'APELLIDOS', 'PROFESION_PADRE', 'PROFESION_MADRE', 'CORREO'], 'string', 'max' => 100],
            [['CIUDAD_NACIMIENTO', 'SEXO', 'CIUDADRES', 'TELEFONO', 'CONTACTO', 'REFERENCIA', 'SISRES'], 'string', 'max' => 45],
            [['PADRE', 'MADRE'], 'string', 'max' => 200],
            [['CSLTKO'], 'string', 'max' => 250],
            [['ALUMNO'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ALUMNO' => 'Alumno',
            'CEDULA' => 'Cedula',
            'NOMBRES' => 'Nombres',
            'APELLIDOS' => 'Apellidos',
            'FECHA_NACIMIENTO' => 'Fecha Nacimiento',
            'CIUDAD_NACIMIENTO' => 'Ciudad Nacimiento',
            'SEXO' => 'Sexo',
            'PADRE' => 'Padre',
            'PROFESION_PADRE' => 'Profesion Padre',
            'MADRE' => 'Madre',
            'PROFESION_MADRE' => 'Profesion Madre',
            'CIUDADRES' => 'Ciudadres',
            'DIRECCION' => 'Direccion',
            'TELEFONO' => 'Telefono',
            'CONTACTO' => 'Contacto',
            'REFERENCIA' => 'Referencia',
            'CORREO' => 'Correo',
            //'FOTO' => 'Foto',
            'archivo' => 'Foto',
            'SISRES' => 'Sisres',
            'SISFECHA' => 'Sisfecha',
            'CSLTKO' => 'Csltko',
        ];
    }

    /**
     * Gets query for [[Matriculas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMatriculas()
    {
        return $this->hasMany(Matriculas::class, ['ALUMNO' => 'ALUMNO']);
    }
}
