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

    <?= $form->field($model, 'PERIODO')->textInput(['type' => 'number', 'maxlength' => 9, 'oninput' => 'javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);',  'placeholder'=>'Ingrese el periodo lectivo. Ejemplo: 2023-2024']) ?>

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
    <?= $form->field($model, 'estado')->dropDownList($model->getEstado(),['prompt'=>'Seleccione el estado']) ?>
    </div>
    <?= $form->field($model, 'rector')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'secretario')->textInput(['maxlength' => true]) ?>

    <div class="form-group" style="margin-top: 20px;">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
