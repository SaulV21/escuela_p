<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var frontend\models\Asistencia $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="asistencia-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ALUMNO')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'MATRICULA')->textInput() ?>

    <?= $form->field($model, 'fecha')->textInput() ?>

    <?= $form->field($model, 'asiste')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
