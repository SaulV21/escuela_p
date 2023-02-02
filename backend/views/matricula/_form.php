<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Cursos;
use backend\models\Alumnos;
use backend\models\Periodo;
use kartik\select2\Select2;
use yii\jui\DatePicker;
/** @var yii\web\View $this */
/** @var backend\models\Matriculas $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="matriculas-form">

    <?php $form = ActiveForm::begin(); ?>

    <!-- Lista de Alumnos -->
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

    <!-- PERIODOS -->
    <?= $form->field($model, 'PERIODO')->dropDownList(
        ArrayHelper::map(Periodo::find()->all(),'PERIODO', 'PERIODO'),
        ['prompt'=>'Seleccione el periodo']
    ) ?>

    <!-- CURSOS -->
    <?= $form->field($model, 'CURSO')->dropDownList(
        ArrayHelper::map(Cursos::find()->all(),'CURSO', 'DESCRIPCION'),
        ['prompt'=>'Seleccione el curso']
    ) ?>

    <!-- <?= $form->field($model, 'CICLO')->textInput(['maxlength' => true]) ?> -->
    <?= $form->field($model, 'CICLO')->dropDownList(['prompt'=>'Seleccione el ciclo', 'DIVERSIFICADO' => 'Diversificado','BASICO'=>'Basico']) ?>

    <!-- Especialidad -->
    <?= $form->field($model, 'ESPECIALIDAD')->dropDownList(['prompt'=>'Seleccione la especialidad', 'GENERAL UNIFICADO' => 'General Unificado','GENERAL UNIFICADO TECNICO'=>'General Unificado Tecnico']) ?>

    <!-- FECHA -->
    <?=$form->field($model, 'FECHA')->widget(DatePicker::className(), [
    'dateFormat' => 'dd-MM-yyyy'
    ])?>

    <?= $form->field($model, 'OBSERVACION')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'REFERENCIA')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'SYSRES')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
