<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;
use yii\web\JqueryAsset;
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

    <?= $form->field($model, 'CEDULA')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'NOMBRES')->textInput(['maxlength' => true]) ?>
    <div class="form-group">
    <?= $form->field($model, 'APELLIDOS')->textInput(['maxlength' => true]) ?>
    </div>

    <div class="form-group" style="margin-top: 20px;">
    <!-- FECHA NACIMIENTO-->
    <?=$form->field($model, 'FECHA_NACIMIENTO')->widget(DatePicker::className(), [
    'dateFormat' => 'yyyy-MM-dd'
    ])?>
</div>
<div class="form-group" style="margin-top: 20px;">
    <?= $form->field($model, 'CIUDAD_NACIMIENTO')->textInput(['maxlength' => true]) ?>
    </div>
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

    <!--Foto -->
    <div class="form-group" style="margin-top: 20px;">
    <?= $form->field($model, 'archivo')->fileInput() ?>
    </div>
    <div class="form-group" style="margin-top: 20px;">
    <?= $form->field($model, 'SISRES')->textInput(['maxlength' => true]) ?>
    </div>
    <?= $form->field($model, 'SISFECHA')->textInput(['readonly' => true, 'value' => date('Y-m-d')]) ?>

    <!-- <?= $form->field($model, 'CSLTKO')->textInput(['maxlength' => true]) ?> -->

    <div class="form-group" style="margin-top: 20px;">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php if (Yii::$app->session->hasFlash('error')): ?>
    <div class="alert alert-danger">
        <?= Yii::$app->session->getFlash('error') ?>
    </div>
<?php endif; ?>