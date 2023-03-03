<?php

namespace backend\models;
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
class Profesor extends \yii\db\ActiveRecord
{
    public $archivo;
    public $documento;
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
            [['PROFESOR'], 'safe'],
            [['CEDULA'], 'required', 'message' => 'Debe ingresar el numero de cedula'],
            [['FECHA_NACIMIENTO'], 'safe'],
            [['FOTO', 'HOJAVIDA'], 'string'],
            [['archivo'], 'file', 'extensions'=>'jpg, png'],
            [['documento'], 'file', 'extensions'=>'pdf, png, jpg'],
            [['PROFESOR', 'NOMBRES', 'DIRECCION', 'TELEFONO', 'AREA'], 'string', 'max' => 45],
            [['CEDULA'], 'string', 'max' => 25],
            [['DESCRIPCION'], 'string', 'max' => 205],
            [['CORREO'], 'string', 'max' => 200],
            [['CLAVE'], 'string', 'max' => 50],
            [['CORREO'], 'autocompleteOff'],
            [['ESTADO'], 'string', 'max' => 10],
            [['CEDULA'], 'unique','message' => 'El numero de cédula {value} ya esta registrada en el sistema.'],
            [['PROFESOR'], 'unique','message' => 'Esta ID del profesor ya esta registrada en el sistema.'],
            
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'PROFESOR' => 'Profesor',
            'CEDULA' => 'Cédula',
            'NOMBRES' => 'Nombres y Apellidos',
            'DESCRIPCION' => 'Descripcion',
            'DIRECCION' => 'Direccion',
            'TELEFONO' => 'Telefono',
            'FECHA_NACIMIENTO' => 'Fecha Nacimiento',
            'archivo' => 'Foto',
            'CORREO' => 'Correo',
            'CLAVE' => 'Clave',
            'documento' => 'Hoja de vida',
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

    public function beforeSave($insert)
    {
        if ($this->isNewRecord) {
            // Incrementar el contador de ID en 1
            $count = Profesor::find()->count();
            $this->PROFESOR = 'PROF-' . ($count + 1);
        }

        return parent::beforeSave($insert);
    }

    //Para evitar el auto completado del navegador
    public function autocompleteOff($attribute, $params)
{
    $this->$attribute->getInputId(true); // Garantizar que se establezca la propiedad 'id' del campo
    $this->$attribute->options['autocomplete'] = 'off';
}
}
