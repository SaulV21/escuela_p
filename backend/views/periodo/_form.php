<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;

/** @var yii\web\View $this */
/** @var backend\models\Periodo $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="periodo-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'PERIODO')->textInput(['maxlength' => true]) ?>

    <!-- Fecha inicio -->
    <?=$form->field($model, 'Fecha_ini_periodo')->widget(DatePicker::className(), [
    'dateFormat' => 'yyyy-MM-dd'
    ])?>

    <!-- Fecha_fin_periodo -->
    <?=$form->field($model, 'Fecha_fin_periodo')->widget(DatePicker::className(), [
    'dateFormat' => 'yyyy-MM-dd'
    ])?>
    <!-- Estado -->
    <?= $form->field($model, 'estado')->dropDownList(['prompt'=>'Seleccione el estado', 'ABIERTO' => 'Abierto','CERRADO'=>'Cerrado']) ?>

    <?= $form->field($model, 'rector')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'secretario')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
