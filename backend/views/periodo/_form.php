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
    <div class="form-group" style="margin-top: 20px;">
    <?=$form->field($model, 'Fecha_ini_periodo')->widget(DatePicker::className(), [
    'dateFormat' => 'yyyy-MM-dd'
    ])?>
    </div>
    <!-- Fecha_fin_periodo -->
    <div class="form-group" style="margin-top: 20px;">
    <?=$form->field($model, 'Fecha_fin_periodo')->widget(DatePicker::className(), [
    'dateFormat' => 'yyyy-MM-dd'
    ])
    ?>
    </div>
    <!-- Estado -->
    <div class="form-group" style="margin-top: 20px;">
    <?= $form->field($model, 'estado')->dropDownList(['prompt'=>'Seleccione el estado', 'ABIERTO' => 'Abierto','CERRADO'=>'Cerrado']) ?>
    </div>
    <?= $form->field($model, 'rector')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'secretario')->textInput(['maxlength' => true]) ?>

    <div class="form-group" style="margin-top: 20px;">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
