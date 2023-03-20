<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\MateriaSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="materias-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'id' => 'mat',
    ]); ?>

    <?= $form->field($model, 'globalSearch')->textInput(['style' => 'width: 30%;']) ?> 
    <div class="form-group" style="margin-top: 10px;">
        <?= Html::submitButton('Buscar', ['class' => 'btn btn-primary']) ?>
        <?= Html::button('Borrar', ['class' => 'btn btn-outline-secondary',
        'onclick' => '$("#' . $form->id . '").find("input[type=text]").val("").end().submit();']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
