<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\Cursos $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="cursos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'CURSO')->textInput(['maxlength' => true, 'placeholder' => 'Ingrese un nombre abreviado del curso. Ejemplo: CUARTO EGB']) ?>

    <?= $form->field($model, 'CUPO')->textInput(['type' => 'number', 'min' => 1, 'max' => 50,'placeholder' => 'Ingrese el numero de cupos estudiantiles para el curso']) ?>

    <?= $form->field($model, 'INICIAL')->textInput(['maxlength' => true, 'placeholder' => 'Ingrese una abreviación del curso. Ejemplo: 4 EGB']) ?>

    <?= $form->field($model, 'CICLO')->widget(\yii\jui\AutoComplete::classname(), [
        'options' => [
            'class' => 'form-control',
        
            'placeholder' => 'BASICA o BASICA SUPERIOR'
        ],
        'clientOptions' => [
            'source' => [
                "BASICA",
                "BASICA SUPERIOR"
            ],
        ],
    ])   ?>

    <?= $form->field($model, 'ESPECIALIDAD')->widget(\yii\jui\AutoComplete::classname(), [
        'options' => [
            'class' => 'form-control',
            'placeholder' => 'BASICA o TECNOLOGICA'
        ],
        'clientOptions' => [
            'source' => [
                "BASICA",
                "TECNOLOGICA"
            ],
        ],
    ])  ?>

    <?= $form->field($model, 'DESCRIPCION')->textInput(['maxlength' => true, 'placeholder' => 'Ingrese una descripcion. Ejemplo: CUARTO AÑO DE EDUCACION GENERAL BASICA']) ?>

    <!-- PROM-->
    <?= $form->field($model, 'PROMOVIDO')->widget(\yii\jui\AutoComplete::classname(), [
        'options' => [
            'class' => 'form-control',
            
            'placeholder' => 'promovido/a a'
        ],
        'clientOptions' => [
            'source' => [
                "promovido/a a SEGUNDO AÑO DE EDUCACIÓN GENERAL BASICA",
                "promovido/a a TERCER AÑO DE EDUCACIÓN GENERAL BASICA",
                "promovido/a a CUARTO AÑO DE EDUCACIÓN GENERAL BASICA",
                "promovido/a a QUINTO AÑO DE EDUCACIÓN GENERAL BASICA",
                "promovido/a a SEXTO AÑO DE EDUCACIÓN GENERAL BASICA",
                "promovido/a a SEPTIMO AÑO DE EDUCACIÓN GENERAL BASICA",
                "promovido/a a OCTAVO AÑO DE EDUCACIÓN GENERAL BASICA",
                "promovido/a a NOVENO AÑO DE EDUCACIÓN GENERAL BASICA",
                "promovido/a a DÉCIMO AÑO DE EDUCACIÓN GENERAL BASICA"
            ],
        ],
    ]) ?>
    <div class="form-group" style="margin-top: 20px;">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
   
</div>
