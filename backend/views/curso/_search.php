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
        'id' => 'curso',
    ]); ?>

<?= $form->field($model, 'globalSearch')->textInput(['style' => 'width: 39%;']) ?> 

    <div class="form-group" style="margin-top: 10px;">
        <?= Html::submitButton('Buscar', ['class' => 'btn btn-primary']) ?>
        <?= Html::button('Borrar', ['class' => 'btn btn-outline-secondary',
        'onclick' => '$("#' . $form->id . '").find("input[type=text]").val("").end().submit();']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
