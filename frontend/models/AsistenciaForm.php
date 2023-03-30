<?php
namespace frontend\models;

use Yii;
use yii\base\Model;

class AsistenciaForm extends Model
{
    public $alumnos = []; // Un arreglo para almacenar el estado de la asistencia de cada alumno

    public function rules()
    {
        return [
            [['alumnos'], 'safe'],
        ];
    }
}