<?php

namespace backend\models;
use backend\models\Cursos;
use Yii;
use yii\helpers\ArrayHelper;
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
            [['ABREVIATURA'], 'required', 'message'=>'Debe agregar una abreviatura para la materia'],
            [['MATERIA'], 'safe', 'message'=>'Debe agregar un identificador para la materia'],
            [['AREA'], 'required', 'message'=>'Debe escoger el area a que pertenece la materia'],
            [['NIVEL'], 'required', 'message'=>'Debe escoger una opción'],
            [['TIPO'], 'required', 'message'=>'Debe escoger una opción'],
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

    public static function getList()
    {
        return self::find()->select(['NOMBRE', 'MATERIA'])->indexBy('MATERIA')->column();
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($this->isNewRecord) {
                // Extrae las primeras letras del campo "nombre"
                $this->NOMBRE=ucwords($this->NOMBRE);
                $primeras_letras = substr($this->NOMBRE, 0, 3);

                // Crea un identificador único a partir de las primeras letras y un número
                $MATERIA = $primeras_letras . rand(100, 999);
                // Asigna el identificador al campo correspondiente
                $this->MATERIA = $MATERIA;
            }
            return true;
        }
        return false;
    }

    public function getNivel()
    {
        return ArrayHelper::map(
            Cursos::find()->all(),
            'CURSO', 'DESCRIPCION'
        );
    }

    public function getTipo()
    {
       return [
        'CUANTITATIVA' => 'Cuantitativa',
        'CUALITATIVA'=>'Cualitativa'
        ];
    }

    public function getArea()
    {
       return [
        'ÁREA TECNICA' => 'ÁREA TECNICA',
        'CIENCIAS NATURALES'=>'CIENCIAS NATURALES',
        'EDUCACIÓN CULTURAL Y ARTÍSTICA'=>'EDUCACIÓN CULTURAL Y ARTÍSTICA',
        'EDUCACION FÍSICA'=>'EDUCACION FÍSICA',
        'PROYECTOS ESCOLARES'=>'PROYECTOS ESCOLARES',
        'COMPORTAMIENTO'=>'COMPORTAMIENTO',
        'EDUCACIÓN PARA LA CIUDADANÍA'=>'EDUCACIÓN PARA LA CIUDADANÍA',
        'EDUCACIÓN RELIGIOSA'=>'EDUCACIÓN RELIGIOSA'
        ];
    }
}
