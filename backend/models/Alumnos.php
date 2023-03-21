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
            [['NOMBRES', 'APELLIDOS', 'PROFESION_PADRE', 'PROFESION_MADRE'], 'string', 'max' => 100],
            [['NOMBRES'], 'match', 'pattern' => '/^[a-zA-Z\s]+$/', 'message' => 'El nombre solo debe contener letras.'],
            [['APELLIDOS'], 'match', 'pattern' => '/^[a-zA-Z\s]+$/', 'message' => 'El apellido solo debe contener letras.'],
            [['PROFESION_PADRE'], 'match', 'pattern' => '/^[a-zA-Z\s]+$/', 'message' => 'Este campo solo debe contener letras.'],
            [['PROFESION_MADRE'], 'match', 'pattern' => '/^[a-zA-Z\s]+$/', 'message' => 'Este campo solo debe contener letras.'],
            [['CORREO'], 'email', 'message' => '{value} no es un correo electrónico válido.'],
            [['CIUDAD_NACIMIENTO', 'SEXO', 'CIUDADRES', 'TELEFONO', 'CONTACTO', 'REFERENCIA', 'SISRES'], 'string', 'max' => 45],
            [['PADRE', 'MADRE'], 'string', 'max' => 200],
            [['CIUDAD_NACIMIENTO'], 'match', 'pattern' => '/^[a-zA-Z\s]+$/', 'message' => 'Este campo solo debe contener letras.'],
            [['CIUDADRES'], 'match', 'pattern' => '/^[a-zA-Z\s]+$/', 'message' => 'Este campo solo debe contener letras.'],
            [['MADRE'], 'match', 'pattern' => '/^[a-zA-Z\s]+$/', 'message' => 'Este campo solo debe contener letras.'],
            [['PADRE'], 'match', 'pattern' => '/^[a-zA-Z\s]+$/', 'message' => 'Este campo solo debe contener letras.'],
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
            'globalSearch'=>'BUSCAR:',
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
        $count = Alumnos::find()->where(['like', 'ALUMNO', 'UEC-'])->count();
        if ($count > 0) {
        // Si el valor generado ya existe, agregar un sufijo numérico al final del valor
        $this->ALUMNO .= 'UEC-0' . ($count + 1);
        } else {
        // Si el valor generado no existe, utilizar el valor generado por defecto
        $this->ALUMNO = 'UEC-' . ($count + 1);
        }}
//
        return parent::beforeSave($insert);
    }

}
