<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;
use yii\web\JqueryAsset;
use yii\helpers\ArrayHelper;
use backend\models\Profesor;
use backend\models\Alumnos;

/** @var yii\web\View $this */
/** @var backend\models\Alumnos $model */
/** @var yii\widgets\ActiveForm $form */



$this->registerJsFile('@web/assets/locale/jquery-ui.min.js', [
    'depends' => [JqueryAsset::class],
]);
?>

<div class="alumnos-form">

    <?php $form = ActiveForm::begin(['options'=> ['enctype'=>'multipart/form-data']]); ?>

    <!-- ID Alumno -->
    <!-- <?= $form->field($model, 'ALUMNO')->textInput(['maxlength' => true, 'readonly' => true,'value' => $model->ALUMNO]) ?> -->

    <?= $form->field($model, 'CEDULA')->textInput(['type' => 'number', 'maxlength' => 10, 'oninput' => 'javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);',  'placeholder'=>'Ingrese el numero de cédula']) ?>

    <?= $form->field($model, 'NOMBRES')->textInput(['maxlength' => true, 'placeholder'=>'Ingrese los nombres completos']) ?>
    <div class="form-group">
    <?= $form->field($model, 'APELLIDOS')->textInput(['maxlength' => true, 'placeholder'=>'Ingrese los apellidos completos']) ?>
    </div>

    <div class="form-group" style="margin-top: 20px;">
    <!-- FECHA NACIMIENTO-->
    <?=$form->field($model, 'FECHA_NACIMIENTO')->widget(DatePicker::className(), [
    'dateFormat' => 'yyyy-MM-dd'
    ])?>
</div>
<div class="form-group" style="margin-top: 20px;">
    <?= $form->field($model, 'CIUDAD_NACIMIENTO')->textInput(['maxlength' => true, 'placeholder'=>'Ingrese nombre de la ciudad']) ?>
    </div>
    <?= $form->field($model, 'SEXO')->dropDownList(
       $model->getSexo(),
       ['prompt'=>'Seleccione el sexo'])
    ?>

    <?= $form->field($model, 'PADRE')->textInput(['maxlength' => true, 'placeholder'=>'Ingrese los nombres y apellidos del padre del estudiante']) ?>

    <?= $form->field($model, 'PROFESION_PADRE')->textInput(['maxlength' => true, 'placeholder'=>'Ingrese el tipo de profesion del padre', 'id'=>'prof-pad']) ?>

    <?= $form->field($model, 'MADRE')->textInput(['maxlength' => true, 'placeholder'=>'Ingrese los nombres y apellidos de la madre del estudiante']) ?>

    <?= $form->field($model, 'PROFESION_MADRE')->textInput(['maxlength' => true, 'placeholder'=>'Ingrese el tipo de profesion de la madre', 'id'=>'prof-mad']) ?>

    <?= $form->field($model, 'CIUDADRES')->textInput(['maxlength' => true, 'placeholder'=>'Ingrese el nombre de la ciudad de residencia del alumno']) ?>

    <?= $form->field($model, 'DIRECCION')->textarea(['rows' => 4, 'placeholder'=>'Nombre de la calle o barrio']) ?>

    <?= $form->field($model, 'TELEFONO')->textInput(['type' => 'number', 'maxlength' => 15, 'oninput' => 'javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);', 'placeholder'=>'Ingrese número de teléfono' ]) ?>

    <?= $form->field($model, 'CONTACTO')->textInput(['maxlength' => true, 'type' => 'number', 'maxlength' => 15, 'oninput' => 'javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);',  'placeholder'=>'Numero de celular en caso de emergencia']) ?>

    <?= $form->field($model, 'REFERENCIA')->textInput(['maxlength' => true, 'placeholder'=>'Nombre del contacto de emergencia']) ?>

    <?= $form->field($model, 'CORREO')->textInput(['maxlength' => true, 'placeholder'=>'usuario@example.com']) ?>

    <!--Foto -->
    <div class="form-group" style="margin-top: 20px;">
    <?= $form->field($model, 'archivo')->fileInput() ?>
    </div>
    <div class="form-group" style="margin-top: 20px;">
    <?= $form->field($model, 'SISRES')->textInput(['maxlength' => true,'id' => 'nombre-input']) ?>
    </div>
    <?= $form->field($model, 'SISFECHA')->textInput(['readonly' => true, 'value' => date('Y-m-d')]) ?>

    <!-- <?= $form->field($model, 'CSLTKO')->textInput(['maxlength' => true]) ?> -->

    <div class="form-group" style="margin-top: 20px;">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

 <?php
// Obtener sugerencias de nombres desde la base de datos
    $sugerencias = ArrayHelper::getColumn(Profesor::find()->select(['nombres'])->asArray()->all(), 'nombres');
    $profesionpadre = ArrayHelper::getColumn(Alumnos::find()->select(['profesion_padre'])->asArray()->all(), 'profesion_padre');
    $profesionmadre = ArrayHelper::getColumn(Alumnos::find()->select(['profesion_madre'])->asArray()->all(), 'profesion_madre');
    ?>
<?php $this->registerJs(
    "
    $(function() {
        var availableTags = " . json_encode($profesionpadre) . ";
        $('#prof-pad').autocomplete({
            source: availableTags
        });
    });
    ",
    \yii\web\View::POS_READY
); ?>

<!-- profesion madre -->
<?php $this->registerJs(
    "
    $(function() {
        var availableTags = " . json_encode($profesionmadre) . ";
        $('#prof-mad').autocomplete({
            source: availableTags
        });
    });
    ",
    \yii\web\View::POS_READY
); ?>
<?php $this->registerJs(
    "
    $(function() {
        var availableTags = " . json_encode($sugerencias) . ";
        $('#nombre-input').autocomplete({
            source: availableTags
        });
    });
    ",
    \yii\web\View::POS_READY
); ?>


<!-- Llamo a la notificacion -->
</div>
<?php if (Yii::$app->session->hasFlash('error')): ?>
    <div class="alert alert-danger">
        <?= Yii::$app->session->getFlash('error') ?>
    </div>
<?php endif; ?>