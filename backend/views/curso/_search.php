<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\CursoSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="cursos-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'CURSO') ?>

    <?= $form->field($model, 'CUPO') ?>

    <?= $form->field($model, 'INICIAL') ?>

    <?= $form->field($model, 'CICLO') ?>

    <?= $form->field($model, 'ESPECIALIDAD') ?>

    <?php // echo $form->field($model, 'DESCRIPCION') ?>

    <?php // echo $form->field($model, 'PROMOVIDO') ?>

    <div class="form-group">
        <?= Html::submitButton('Buscar', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Limpiar', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
