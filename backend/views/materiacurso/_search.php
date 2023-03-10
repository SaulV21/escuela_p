<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\MateriacursoSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="materia-curso-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'CURSO') ?>

    <?= $form->field($model, 'MATERIA') ?>

    <?= $form->field($model, 'PROFESOR') ?>

    <?= $form->field($model, 'PERIODO') ?>

    <div class="form-group">
        <?= Html::submitButton('Buscar', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Limpiar', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
