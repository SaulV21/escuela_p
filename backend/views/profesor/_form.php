<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;

/** @var yii\web\View $this */
/** @var backend\models\Profesor $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="profesor-form">

    <?php $form = ActiveForm::begin(); ?>

    <!-- <?= $form->field($model, 'PROFESOR')->textInput(['maxlength' => true]) ?> -->

    <?= $form->field($model, 'CEDULA')->textInput(['type' => 'number', 'minlength' => 10, 'maxlength' => 10, 'placeholder'=>'Ingrese el numero de cédula']) ?>

    <?= $form->field($model, 'NOMBRES')->textInput(['maxlength' => true, 'placeholder'=>'Ingrese los nombres y apellidos completos']) ?>

    <?= $form->field($model, 'DESCRIPCION')->textInput(['maxlength' => true, 'placeholder'=>'Ingrese una descripción del docente']) ?>

    <?= $form->field($model, 'DIRECCION')->textInput(['maxlength' => true, 'placeholder'=>'Ingrese la dirección de residencia']) ?>

    <?= $form->field($model, 'TELEFONO')->textInput(['type' => 'number', 'maxlength' => 15, 'maxlength' => true, 'placeholder'=>'Ingrese el numero de telefono']) ?>

    <!-- <?= $form->field($model, 'FECHA_NACIMIENTO')->textInput() ?> -->
    <!-- Fecha_fin_periodo -->
    <div class="form-group" style="margin-top: 20px;">
    <?=$form->field($model, 'FECHA_NACIMIENTO')->widget(DatePicker::className(), [
    'dateFormat' => 'yyyy-MM-dd'
    ])
    ?>
    </div>

    <!-- <?= $form->field($model, 'FOTO')->textInput() ?> -->
    <div class="form-group" style="margin-top: 20px;">
    <?= $form->field($model, 'archivo')->fileInput() ?>
    </div>
    <div class="form-group" style="margin-top: 20px;">
    <?= $form->field($model, 'CORREO')->textInput(['autocomplete' => 'off','maxlength' => true, 'placeholder'=>'usuario@example.com']) ?>
    </div>
    <?= $form->field($model, 'CLAVE')->passwordInput(['maxlength' => true, 'id' => 'password-input']) ?>
    <button id="toggle-password" type="button">Mostrar</button>

    <!-- <?= $form->field($model, 'HOJAVIDA')->textInput() ?> -->

    <!-- <?= $form->field($model, 'documento')->fileInput() ?> -->
    <div class="form-group" style="margin-top: 20px;">
    <?= $form->field($model, 'AREA')->textInput(['maxlength' => true, 'placeholder'=>'Nombre del area de educación que imparte el profesor']) ?>
    </div>
    <!-- <?= $form->field($model, 'ESTADO')->textInput(['maxlength' => true]) ?> -->
    <?= $form->field($model, 'ESTADO')->dropDownList(['prompt'=>'Seleccione el estado', 'ACTIVO' => 'Activo','INACTIVO'=>'Inactivo']) ?>
    
    <div class="form-group" style="margin-top: 20px;">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
<script>
    document.addEventListener('DOMContentLoaded', function() {
  const passwordInput = document.getElementById('password-input');
  const toggleButton = document.getElementById('toggle-password');
  
  toggleButton.addEventListener('click', function() {
    if (passwordInput.type === 'password') {
      passwordInput.type = 'text';
      toggleButton.textContent = 'Ocultar';
    } else {
      passwordInput.type = 'password';
      toggleButton.textContent = 'Mostrar';
    }
  });
});
</script>
</div>
