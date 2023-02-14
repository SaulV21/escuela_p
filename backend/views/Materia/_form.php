<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Cursos;
use yii\helpers\ArrayHelper;

/** @var yii\web\View $this */
/** @var backend\models\Materias $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="materias-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'MATERIA')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'NOMBRE')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'DESCRIPCION')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'HORAS')->textInput() ?>

    <!-- NIVEL -->
    <?= $form->field($model, 'NIVEL')->dropDownList(
        ArrayHelper::map(Cursos::find()->all(),'CURSO', 'INICIAL'),
        ['prompt'=>'Seleccione el nivel']
    ) ?>

    <!-- TIPO -->
    <?= $form->field($model, 'TIPO')->dropDownList(['prompt'=>'Seleccione el tipo', 'CUANTITATIVA' => 'Cuantitativa','CUALITATIVA'=>'Cualitativa']) ?>

    <?= $form->field($model, 'ABREVIATURA')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'PRIORIDAD')->textInput() ?>

    <!--AREA -->
    <?= $form->field($model, 'AREA')->dropDownList(['prompt'=>'Seleccione', 'ÁREA TECNICA' => 'ÁREA TECNICA','CIENCIAS NATURALES'=>'CIENCIAS NATURALES'
    ,'EDUCACIÓN CULTURAL Y ARTÍSTICA'=>'EDUCACIÓN CULTURAL Y ARTÍSTICA','EDUCACION FÍSICA'=>'EDUCACION FÍSICA','PROYECTOS ESCOLARES'=>'PROYECTOS ESCOLARES'
    ,'COMPORTAMIENTO'=>'COMPORTAMIENTO','EDUCACIÓN PARA LA CIUDADANÍA'=>'EDUCACIÓN PARA LA CIUDADANÍA'
    ,'EDUCACIÓN RELIGIOSA'=>'EDUCACIÓN RELIGIOSA']) ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
