<?php

namespace backend\models;
use Yii;
use yii\base\model;

class ValidarFormulario extends models {
    public $NOMBRES;
    public $email;
    
    public function rules()
    {
        return [
            ['NOMBRES', 'required', 'message' => 'Campo requerido'],
            ['NOMBRES', 'match', 'pattern' => "/^.{3,50}$/", 'message' => 'Mínimo 3 y máximo 50 caracteres'],
            ['NOMBRES', 'match', 'pattern' => "/^[0-9a-z]+$/i", 'message' => 'Sólo se aceptan letras y números'],
            // ['email', 'required', 'message' => 'Campo requerido'],
            // ['email', 'match', 'pattern' => "/^.{5,80}$/", 'message' => 'Mínimo 5 y máximo 80 caracteres'],
            // ['email', 'email', 'message' => 'Formato no válido'],
        ];
    }
    
    public function attributeLabels()
    {
        return [
            'NOMBRES' => 'Nombres:',
            // 'email' => 'Email:',
        ];
    }
 
}