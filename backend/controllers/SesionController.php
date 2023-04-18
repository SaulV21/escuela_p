<?php

namespace backend\controllers;
use common\models\User;
use backend\models\Alumnos;
use backend\models\Cursos;
use backend\models\Matricula;

class SesionController extends \yii\web\Controller
{
    public $enableCsrfValidation=false;

    public function actionIndex()
    {
        return $this->render('index');
    }


    public function actionInisesion($usuario, $pass)
    {
        $user = $this->findModel($usuario);
    
        if ($user->validatePassword($pass)) {
            return 'true';
        } else {
            return 'false';
        }
    }
    
    public function actionListarusuarios()
    {
    $model=User::find()->select(["id","username","email","password_hash", "status","created_at"])
    ->asArray()->all();
    return json_encode($model);
    }

    public function actionListaralumnos($curso){
        $model = Alumnos::find()
        ->select(['MAX(m.NUMEROMATRICULA) as m','a.alumno','a.nombres', 'a.apellidos'])
        ->from('alumnos a')
        ->join('INNER JOIN', 'matriculas m', 'a.ALUMNO = m.ALUMNO')
        ->where(['m.CURSO' => $curso])
        ->groupBy(['a.alumno','a.nombres','a.apellidos'])
        ->asArray()
        ->all();
    
        return json_encode($model);
    }

    protected function findModel($usuario)
    {
        $user = User::findByUsername($usuario);
        
        if ($user !== null) {
            return $user;
        } else {
            throw new NotFoundHttpException('Usuario no encontrado.');
            }
        }
}
