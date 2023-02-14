<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Matriculas;
use backend\models\Materias;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;

/** @var yii\web\View $this */
/** @var frontend\models\Notasql $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="notasql-form">

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
    <!-- MATERIAS -->
    <?= $form->field($model, 'MATERIA')->dropDownList(
        ArrayHelper::map(Materias::find()->all(),'MATERIA', 'NOMBRE'),
        ['prompt'=>'Seleccione la materia']
    ) ?>
    <?= $form->field($model, 'P1Q1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'P2Q1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'EQUIV80')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'EV_QUIM')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'EQUIV20')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'PROM_QUI')->textInput(['maxlength' => true]) ?>

    <!-- Rendimiento Academico -->
    <?= $form->field($model, 'EQ_CUAL')->dropDownList(['prompt'=>'Seleccione', 'DAR' => 'Domina los aprendizajes requeridos','AAR'=>'Alcanza los aprendizajes requeridos'
    ,'PAAR'=>'Proximo a alcanzar los aprendizajes requeridos','NAAR'=>'No alcanza los aprendizajes requeridos']) ?>

    <!-- <?= $form->field($model, 'COMP')->textInput(['maxlength' => true]) ?> -->
    <?= $form->field($model, 'COMP')->dropDownList(['prompt'=>'Escala Comportamental', 'A' => 'Muy satisfactorio','B'=>'Satisfactorio'
    ,'C'=>'Poco satisfactorio','D'=>'Mejorable','E'=>'Insatisfactorio']) ?>

    <?= $form->field($model, 'NF')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
