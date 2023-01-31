<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\Alumnos $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="alumnos-form">

    <?php $form = ActiveForm::begin(['options'=> ['enctype'=>'multipart/form-data']]); ?>

    <?= $form->field($model, 'ALUMNO')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'CEDULA')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'NOMBRES')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'APELLIDOS')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'FECHA_NACIMIENTO')->textInput() ?>

    <?= $form->field($model, 'CIUDAD_NACIMIENTO')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'SEXO')->dropDownList(['prompt'=>'Seleccione el sexo', 'M' => 'Masculino','F'=>'Femenino']) ?>

    <?= $form->field($model, 'PADRE')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'PROFESION_PADRE')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'MADRE')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'PROFESION_MADRE')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'CIUDADRES')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'DIRECCION')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'TELEFONO')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'CONTACTO')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'REFERENCIA')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'CORREO')->textInput(['maxlength' => true]) ?>

    <!-- <?= $form->field($model, 'FOTO')->textInput() ?> -->
    <?= $form->field($model, 'archivo')->fileInput() ?>

    <?= $form->field($model, 'SISRES')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'SISFECHA')->textInput() ?>

    <?= $form->field($model, 'CSLTKO')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
