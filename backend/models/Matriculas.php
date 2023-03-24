<?php

namespace backend\models;
use backend\models\Periodo;
use Yii;
use yii\helpers\ArrayHelper;
use backend\models\Cursos;

/**
 * This is the model class for table "matriculas".
 *
 * @property int $NUMEROMATRICULA
 * @property string|null $ALUMNO
 * @property string|null $PERIODO
 * @property string|null $CURSO
 * @property string|null $CICLO
 * @property string|null $ESPECIALIDAD
 * @property string|null $FECHA
 * @property string|null $OBSERVACION
 * @property string|null $REFERENCIA
 * @property string|null $SYSRES
 *
 * @property Alumnos $aLUMNO
 * @property Asistencia[] $asistencias
 * @property Cursos $cURSO
 * @property Materias[] $mATERIAs
 * @property Materias[] $mATERIAs0
 * @property MatriculaDetalle[] $matriculaDetalles
 * @property Notasql[] $notasqls
 * @property Periodo $pERIODO
 * @property Parcial[] $parcials
 * @property Quimestres[] $quimestres
 */
class Matriculas extends \yii\db\ActiveRecord
{

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'matriculas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['FECHA'], 'safe'],
            [['ALUMNO', 'PERIODO', 'CURSO', 'CICLO', 'REFERENCIA'], 'string', 'max' => 45],
            [['ESPECIALIDAD'], 'string', 'max' => 200],
            [['OBSERVACION'], 'string', 'max' => 250],
            [['SYSRES'], 'string', 'max' => 150],
            [['ALUMNO'], 'required', 'message' => 'Por favor seleccione un alumno'],
            [['PERIODO'], 'required', 'message' => 'Por favor seleccione el período'],
            [['CURSO'], 'required', 'message' => 'Por favor seleccione un curso'],
            [['CICLO'], 'required', 'message' => 'Por favor seleccione un ciclo'],
            [['ESPECIALIDAD'], 'required', 'message' => 'Por favor seleccione una especialidad'],
            [['PERIODO'], 'exist', 'skipOnError' => true, 'targetClass' => Periodo::class, 'targetAttribute' => ['PERIODO' => 'PERIODO']],
            [['ALUMNO'], 'exist', 'skipOnError' => true, 'targetClass' => Alumnos::class, 'targetAttribute' => ['ALUMNO' => 'ALUMNO']],
            [['CURSO'], 'exist', 'skipOnError' => true, 'targetClass' => Cursos::class, 'targetAttribute' => ['CURSO' => 'CURSO']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'NUMEROMATRICULA' => '# matricula',
            'globalSearch'=>'BUSCAR:',
            'ALUMNO' => 'Alumno',
            'PERIODO' => 'Periodo',
            'CURSO' => 'Curso',
            'CICLO' => 'Ciclo',
            'ESPECIALIDAD' => 'Especialidad',
            'FECHA' => 'Fecha',
            'OBSERVACION' => 'Observación',
            'REFERENCIA' => 'Referencia',
            'SYSRES' => 'Registrador',
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
     * Gets query for [[Asistencias]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAsistencias()
    {
        return $this->hasMany(Asistencia::class, ['MATRICULA' => 'NUMEROMATRICULA']);
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
     * Gets query for [[MATERIAs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMATERIAs()
    {
        return $this->hasMany(Materias::class, ['MATERIA' => 'MATERIA'])->viaTable('matricula_detalle', ['MATRICULA' => 'NUMEROMATRICULA']);
    }

    /**
     * Gets query for [[MATERIAs0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMATERIAs0()
    {
        return $this->hasMany(Materias::class, ['MATERIA' => 'MATERIA'])->viaTable('notasql', ['MATRICULA' => 'NUMEROMATRICULA']);
    }

    /**
     * Gets query for [[MatriculaDetalles]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMatriculaDetalles()
    {
        return $this->hasMany(MatriculaDetalle::class, ['MATRICULA' => 'NUMEROMATRICULA']);
    }

    /**
     * Gets query for [[Notasqls]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNotasqls()
    {
        return $this->hasMany(Notasql::class, ['MATRICULA' => 'NUMEROMATRICULA']);
    }

    /**
     * Gets query for [[PERIODO]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPERIODO()
    {
        return $this->hasOne(Periodos::class, ['PERIODO' => 'PERIODO']);
    }

    /**
     * Gets query for [[Parcials]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getParcials()
    {
        return $this->hasMany(Parcial::class, ['MATRICULA' => 'NUMEROMATRICULA']);
    }

    /**
     * Gets query for [[Quimestres]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getQuimestres()
    {
        return $this->hasMany(Quimestres::class, ['MATRICULA' => 'NUMEROMATRICULA']);
    }



    public function search($params){
        $query=new \yii\db\Query();
        $query->join(['alumnos']);
        $this->load($params);
        if($this->validate()){

        }
        return $dataProvider;
    }
//Creamos la relacion con alumnos 
    public function getListnombre(){
        return $this->hasOne(Alumnos::className(),['ALUMNO'=>'ALUMNO']);
    }

    public function getListaPeriodo()
    {
        // Devuelve una matriz de opciones para el campo dropdown
        return ArrayHelper::map(
            Periodo::find()->where(['ESTADO' => 'ABIERTO'])->all(),
            'PERIODO', 'PERIODO'
        );
    }

    public function getListaCursos()
    {
        // Devuelve una matriz de opciones para el campo dropdown
        return ArrayHelper::map(
            Cursos::find()->all(),
            'CURSO', 'DESCRIPCION'
        );
    }

    public function getCiclo()
    {
       return [
            'DIVERSIFICADO' => 'Diversificado',
            'BASICO'=>'Basico'
        ];
    }

    public function getEspecialidad()
    {
       return [
        'GENERAL UNIFICADO' => 'General Unificado',
        'GENERAL UNIFICADO TECNICO'=>'General Unificado Tecnico'
        ];
    }
}
