<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;
use yii\helpers\ArrayHelper;
use backend\models\Profesor;

/** @var yii\web\View $this */
/** @var backend\models\Profesor $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="profesor-form">
    <?php $form = ActiveForm::begin(); ?>

    <!-- <?= $form->field($model, 'PROFESOR')->textInput(['maxlength' => true]) ?> -->

    <?= $form->field($model, 'CEDULA')->textInput(['type' => 'number', 'maxlength' => 10, 'oninput' => 'javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);', 'placeholder'=>'Ingrese el numero de cédula']) ?>

    <?= $form->field($model, 'NOMBRES')->textInput(['maxlength' => true, 'placeholder'=>'Ingrese los nombres y apellidos completos'])->error(['class' => 'help-block']) ?>

    <?= $form->field($model, 'DESCRIPCION')->textInput(['maxlength' => true, 'placeholder'=>'Ingrese una descripción del docente']) ?>

    <?= $form->field($model, 'DIRECCION')->textInput(['maxlength' => true, 'placeholder'=>'Ingrese la dirección de residencia']) ?>

    <?= $form->field($model, 'TELEFONO')->textInput(['type' => 'number', 'maxlength' => 15, 'oninput' => 'javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);', 'placeholder'=>'Ingrese el numero de telefono']) ?>

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
<!-- Hoja de vida -->
    <?= $form->field($model, 'documento')->fileInput() ?>
    <div class="form-group" style="margin-top: 20px;">
    <?= $form->field($model, 'AREA')->textInput(['maxlength' => true, 'placeholder'=>'Nombre del area de educación que imparte el profesor', 'id'=>'area-input']) ?>
    </div>
    <!-- Estado -->
    <?= $form->field($model, 'ESTADO')->dropDownList([
        'ACTIVO' => 'Activo',
        'INACTIVO' => 'Inactivo',
    ], [
        'prompt' => 'Seleccione el estado',
        'options' => [
            'ACTIVO' => ['selected' => true],
        ],
    ]) 
?>

    
    <div class="form-group" style="margin-top: 20px;">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
<!-- Sugerencias area -->
<?php
// Obtener sugerencias de nombres desde la base de datos
    $sugerencias = ArrayHelper::getColumn(Profesor::find()->select(['area'])->asArray()->all(), 'area');
    ?>

<?php $this->registerJs(
    "
    $(function() {
        var availableTags = " . json_encode($sugerencias) . ";
        $('#area-input').autocomplete({
            source: availableTags
        });
    });
    ",
    \yii\web\View::POS_READY
); ?>
    <!-- Mostrar/ocultar contraseña -->
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
