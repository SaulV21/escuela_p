<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\Profesor $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="profesor-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'PROFESOR')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'CEDULA')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'NOMBRES')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'DESCRIPCION')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'DIRECCION')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'TELEFONO')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'FECHA_NACIMIENTO')->textInput() ?>

    <?= $form->field($model, 'FOTO')->textInput() ?>

    <?= $form->field($model, 'CORREO')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'CLAVE')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'HOJAVIDA')->textInput() ?>

    <?= $form->field($model, 'AREA')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ESTADO')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
