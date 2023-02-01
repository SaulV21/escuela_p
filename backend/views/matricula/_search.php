<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\MatriculaSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="matriculas-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'NUMEROMATRICULA') ?>

    <?= $form->field($model, 'ALUMNO') ?>

    <?= $form->field($model, 'PERIODO') ?>

    <?= $form->field($model, 'CURSO') ?>

    <?= $form->field($model, 'CICLO') ?>

    <?php // echo $form->field($model, 'ESPECIALIDAD') ?>

    <?php // echo $form->field($model, 'FECHA') ?>

    <?php // echo $form->field($model, 'OBSERVACION') ?>

    <?php // echo $form->field($model, 'REFERENCIA') ?>

    <?php // echo $form->field($model, 'SYSRES') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
