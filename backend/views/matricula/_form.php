<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\Matriculas $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="matriculas-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ALUMNO')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'PERIODO')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'CURSO')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'CICLO')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ESPECIALIDAD')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'FECHA')->textInput() ?>

    <?= $form->field($model, 'OBSERVACION')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'REFERENCIA')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'SYSRES')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
