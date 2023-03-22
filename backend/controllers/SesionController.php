<?php

namespace backend\controllers;
use common\models\User;

class SesionController extends \yii\web\Controller
{
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
