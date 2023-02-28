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
    public $nombreCompleto;
    public $id;
    public function getNombreCompleto()
    {
        return $this->listnombre->NOMBRES . ' ' . $this->listnombre->APELLIDOS;
    }

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
            [['ALUMNO'], 'safe'],
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
            'ALUMNO' => 'ID',
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
            'CIUDADRES' => 'Ciudad de residencia',
            'DIRECCION' => 'Direccion',
            'TELEFONO' => 'Telefono',
            'CONTACTO' => 'Contacto',
            'REFERENCIA' => 'Referencia',
            'CORREO' => 'Correo',
            //'FOTO' => 'Foto',
            'archivo' => 'Foto',
            'SISRES' => 'Registrador',
            'SISFECHA' => 'Fecha registro',
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

    public function beforeSave($insert)
    {
        if ($this->isNewRecord) {
            // Incrementar el contador de ID en 1
            $count = Alumnos::find()->count();
            $this->ALUMNO = 'UEC-' . ($count + 1);
        }

        return parent::beforeSave($insert);
    }
    // public function beforeSave($insert)
    // {
    //     if (parent::beforeSave($insert)) {
    //         if ($this->isNewRecord) {
    //             // Obtener el último registro
    //             $lastRecord = Alumnos::find()->orderBy(['ALUMNO' => SORT_DESC])->one();

    //             // Obtener el último número de ID y agregar 1
    //             $lastNumber = 1;
    //             if ($lastRecord) {
    //                 $lastNumber = substr($lastRecord->ALUMNO, 4) + 1;
    //             }

    //             // Crear el nuevo ID
    //             $this->ALUMNO = 'UEC-' . $lastNumber;
    //         }

    //         return true;
    //     } else {
    //         return false;
    //     }
    // }
}
