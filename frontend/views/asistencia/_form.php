<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Alumnos;
use backend\models\Cursos;
use backend\models\Matriculas;
use kartik\select2\Select2;
use yii\jui\DatePicker;
/** @var yii\web\View $this */
/** @var frontend\models\Asistencia $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="asistencia-form">

    <?php $form = ActiveForm::begin(); ?>

    <!-- <?= $form->field($model, 'ALUMNO')->textInput(['maxlength' => true]) ?> -->
    <?= $form->field($model, 'ALUMNO')->widget(Select2::classname(), [
    'data' => ArrayHelper::map(Alumnos::find()->all(),'ALUMNO',  function ($model) {
        return $model['NOMBRES'] .' '. $model['APELLIDOS'];
    }),
    'language' => 'en',
    'options' => ['placeholder' => 'Seleccione el alumno'],
    'pluginOptions' => [
        'allowClear' => true
    ],
]);?>
    <!-- <?= $form->field($model, 'CURSO')->textInput(['maxlength' => true]) ?> -->
    <?= $form->field($model, 'CURSO')->widget(Select2::classname(), [
    'data' => ArrayHelper::map(Cursos::find()->all(),'CURSO',  function ($model) {
        return $model['DESCRIPCION'];
    }),
    'language' => 'en',
    'options' => ['placeholder' => 'Seleccione el curso'],
    'pluginOptions' => [
        'allowClear' => true
    ],
]);?>
    <?= $form->field($model, 'MATRICULA')->textInput() ?>
   
    <!-- <?= $form->field($model, 'fecha')->textInput() ?> -->
    <?=$form->field($model, 'fecha')->textInput(['readonly' => true, 'value' => date('Y-m-d')])?>

    <!-- <?= $form->field($model, 'asiste')->textInput(['maxlength' => true]) ?> -->
    <?= $form->field($model, 'asiste')->dropDownList(['prompt'=>'Seleccione el estado', 'SI' => 'Si','NO'=>'No']) ?>
    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
