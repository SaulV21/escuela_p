<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\Periodo $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="periodo-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'PERIODO')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Fecha_ini_periodo')->textInput() ?>

    <?= $form->field($model, 'Fecha_fin_periodo')->textInput() ?>

    <?= $form->field($model, 'estado')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rector')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'secretario')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
