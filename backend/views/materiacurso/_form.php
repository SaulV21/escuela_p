<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Cursos;
use backend\models\Materias;
use backend\models\Profesor;
use backend\models\Periodo;
use yii\helpers\ArrayHelper;

/** @var yii\web\View $this */
/** @var backend\models\MateriaCurso $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="materia-curso-form">

    <?php $form = ActiveForm::begin(); ?>

     <!-- CURSOS -->
     <?= $form->field($model, 'CURSO')->dropDownList(
        ArrayHelper::map(Cursos::find()->all(),'CURSO', 'DESCRIPCION'),
        ['prompt'=>'Seleccione el curso']
    ) ?>


    <!--MATERIAS -->
    <?= $form->field($model, 'MATERIA')->dropDownList(
        ArrayHelper::map(Materias::find()->all(),'MATERIA', 'DESCRIPCION'),
        ['prompt'=>'Seleccione la materia']
    ) ?>

    <!--PROFESOR -->
    <?= $form->field($model, 'PROFESOR')->dropDownList(
        ArrayHelper::map(Profesor::find()->all(),'PROFESOR', 'NOMBRES'),
        ['prompt'=>'Seleccione el docente']
    ) ?>

    <!-- PERIODOS -->
    <?= $form->field($model, 'PERIODO')->dropDownList(
        ArrayHelper::map(Periodo::find()->where(['ESTADO' => 'ABIERTO'])->all(),'PERIODO', 'PERIODO'),
        ['prompt'=>'Seleccione el periodo']
    ) ?>

    <div class="form-group" style="margin-top: 20px;">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
