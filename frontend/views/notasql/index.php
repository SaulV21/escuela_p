<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$form = ActiveForm::begin(['id' => 'form']);
?>

<?= $form->field($model, 'MATERIA')->dropDownList($materias, ['prompt' => 'Seleccionar materia']) ?>

<?= Html::submitButton('Buscar', ['class' => 'btn btn-primary']) ?>

<table id="items-table" class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>MATERIA</th>
            <th>MATRICULA</th>
            <th>P1Q1</th>
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>

<?php ActiveForm::end(); ?>
<?php
$js = <<<JS
$(document).ready(function() {
    $('#form').on('submit', function(event) {
        event.preventDefault();
        var formData = $(this).serialize();
        $.get('/NotasqlController/actionMat', formData, function(data) {
            $('#items-table tbody').html(data);
        });
    });
});
JS;
$this->registerJs($js);
?>