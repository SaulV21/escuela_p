<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

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

    <?= $form->field($model, 'NIVEL')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'TIPO')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ABREVIATURA')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'PRIORIDAD')->textInput() ?>

    <?= $form->field($model, 'AREA')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
