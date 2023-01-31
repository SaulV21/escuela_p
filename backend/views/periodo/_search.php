<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\PeriodoSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="periodo-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'PERIODO') ?>

    <?= $form->field($model, 'Fecha_ini_periodo') ?>

    <?= $form->field($model, 'Fecha_fin_periodo') ?>

    <?= $form->field($model, 'estado') ?>

    <?= $form->field($model, 'rector') ?>

    <?php // echo $form->field($model, 'secretario') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
