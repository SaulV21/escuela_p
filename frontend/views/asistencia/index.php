<?php

use frontend\models\Asistencia;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use frontend\controllers\AsistenciaController;
use yii\helpers\ArrayHelper;
use frontend\models\AsistenciaForm;
use yii\web\JsExpression;
use yii\widgets\Pjax;
use backend\assets\AppAsset;
/** @var yii\web\View $this */
/** @var frontend\models\AsistenciaSearch $searchModel */
/** @var frontend\controllers\AsistenciaController $categories */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Asistencias';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="asistencia-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'alumno',
            'nombres',
            'apellidos',
            [  
                'class' => 'yii\grid\CheckboxColumn',
                'name'=>'asiste',
                 'checkboxOptions' => function($model, $key, $index, $column) {
                return [
                    'checked' => true
                ];}
            ],
        ],
    ]); ?>
<!-- <?= Html::a('Guardar', ['create', 'criterio' => $criterio], ['class' => 'btn btn-success']) ?> -->
<?= Html::button('Guardar', ['class' => 'btn btn-success', 'id' => 'guardar-asistencia']) ?>

</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).on('click', '#guardar-asistencia', function() {
    var data = [];
    $('input[name="asiste"]').each(function() {
        var asiste = $(this).prop('checked') ? 'si' : 'no';
        var alumno = $(this).closest('tr').find('td:eq(0)').text();
        var fecha = date('Y-m-d');
        data.push({
            alumno: alumno,
            fecha: fecha,
            asiste: asiste
        });
    });
    console.log(data); // Agregar esta línea para ver los datos en la consola
    $.ajax({
        type: 'POST',
        url: 'index.php?r=asistencia/guardar',
        data: {data: data},
        success: function(response) {
            alert('Asistencia guardada exitosamente');
        },
        error: function(xhr, status, error) {
            console.log(xhr.responseText);
        }
    });
});
</script>


<!-- pruebas -->

<!-- <?= Html::beginForm('', 'post', ['id' => 'gridview-form']) ?>
<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        'alumno',
        'nombres',
        'apellidos',
        [  
            'class' => 'yii\grid\CheckboxColumn',
            'checkboxOptions' => function($model, $key, $index, $column) {
                return [
                    'checked' => true
                ];
            }
        ],
    ],
]); ?>
<?= Html::button('Guardar', ['class' => 'btn btn-success', 'id' => 'guardar-btn']) ?>
<?= Html::endForm() ?>

<?php
    // Aquí agregamos el código para enviar los datos mediante AJAX
    $url = Url::to(['guardar', 'criterio' => $criterio]);
    $csrf = Yii::$app->request->csrfToken;
    $js = <<<JS
        $('#guardar-btn').on('click', function(e) {
            e.preventDefault();
            var data = $('#gridview-form').serializeArray();
            $.ajax({
                url: '{$url}',
                type: 'post',
                dataType: 'json',
                data: {
                    _csrf: '{$csrf}',
                    data: data,
                },
                success: function(response) {
                    // Aquí puedes agregar alguna acción en caso de éxito
                    console.log(response);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    // Aquí puedes agregar alguna acción en caso de error
                    console.log(jqXHR);
                },
            });
        });
    JS;
    $this->registerJs($js);
?> -->
