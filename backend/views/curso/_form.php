<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\Cursos $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="cursos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'CURSO')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'CUPO')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'INICIAL')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'CICLO')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ESPECIALIDAD')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'DESCRIPCION')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'PROMOVIDO')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
