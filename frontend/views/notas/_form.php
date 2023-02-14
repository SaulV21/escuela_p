<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Matriculas;
use backend\models\Materias;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;

/** @var yii\web\View $this */
/** @var frontend\models\Notas $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="notas-form">

    <?php $form = ActiveForm::begin(); ?>

    <!-- <?= $form->field($model, 'MATRICULA')->textInput() ?> -->
    <?= $form->field($model, 'MATRICULA')->widget(Select2::classname(), [
    'data' => ArrayHelper::map(Matriculas::find()->all(),'NUMEROMATRICULA',  function ($model) {
        return $model['ALUMNO'];
    }),
    'language' => 'en',
    'options' => ['placeholder' => 'Seleccione'],
    'pluginOptions' => [
        'allowClear' => true
    ],
]);?>

    <!-- <?= $form->field($model, 'MATERIA')->textInput(['maxlength' => true]) ?> -->
    <?= $form->field($model, 'MATERIA')->dropDownList(
        ArrayHelper::map(Materias::find()->all(),'MATERIA', 'NOMBRE'),
        ['prompt'=>'Seleccione la materia']
    ) ?>
    <?= $form->field($model, 'QUIM1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'QUIM2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'TOTAL')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'PROMF')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'EQUIV')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'SUM_TOT')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'PROM_GE')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'SUPLETORIO')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'REMEDIAL')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'GRACIA')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'PROMOCION')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
