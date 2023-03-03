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

    <?= $form->field($model, 'CICLO')->textInput(['maxlength' => true, 'placeholder' => 'BÁSICA o BÁSICA SUPERIOR']) ?>

    <?= $form->field($model, 'ESPECIALIDAD')->textInput(['maxlength' => true, 'placeholder' => 'BÁSICA o TECNOLÓGICA']) ?>

    <?= $form->field($model, 'DESCRIPCION')->textInput(['maxlength' => true, 'placeholder' => 'Ingrese una descripcion. Ejemplo: CUARTO AÑO DE EDUCACION GENERAL BASICA']) ?>

    <?= $form->field($model, 'PROMOVIDO')->textInput(['maxlength' => true, 'placeholder' => 'promovido/a a ']) ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
