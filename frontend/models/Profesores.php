<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "profesores".
 *
 * @property string $PROFESOR
 * @property string $CEDULA
 * @property string|null $NOMBRES
 * @property string|null $DESCRIPCION
 * @property string|null $DIRECCION
 * @property string|null $TELEFONO
 * @property string|null $FECHA_NACIMIENTO
 * @property resource|null $FOTO
 * @property string|null $CORREO
 * @property string|null $CLAVE
 * @property resource|null $HOJAVIDA
 * @property string|null $AREA
 * @property string $ESTADO
 *
 * @property Materiasxcurso[] $materiasxcursos
 */
class Profesores extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'profesores';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['PROFESOR', 'CEDULA'], 'required'],
            [['FECHA_NACIMIENTO'], 'safe'],
            [['FOTO', 'HOJAVIDA'], 'string'],
            [['PROFESOR', 'NOMBRES', 'DIRECCION', 'TELEFONO', 'AREA'], 'string', 'max' => 45],
            [['CEDULA'], 'string', 'max' => 25],
            [['DESCRIPCION'], 'string', 'max' => 205],
            [['CORREO'], 'string', 'max' => 200],
            [['CLAVE'], 'string', 'max' => 50],
            [['ESTADO'], 'string', 'max' => 10],
            [['CEDULA'], 'unique'],
            [['PROFESOR'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'PROFESOR' => 'Profesor',
            'CEDULA' => 'Cedula',
            'NOMBRES' => 'Nombres',
            'DESCRIPCION' => 'Descripcion',
            'DIRECCION' => 'Direccion',
            'TELEFONO' => 'Telefono',
            'FECHA_NACIMIENTO' => 'Fecha Nacimiento',
            'FOTO' => 'Foto',
            'CORREO' => 'Correo',
            'CLAVE' => 'Clave',
            'HOJAVIDA' => 'Hojavida',
            'AREA' => 'Area',
            'ESTADO' => 'Estado',
        ];
    }

    /**
     * Gets query for [[Materiasxcursos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMateriasxcursos()
    {
        return $this->hasMany(Materiasxcurso::class, ['PROFESOR' => 'PROFESOR']);
    }
}
