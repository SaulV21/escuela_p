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
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var frontend\models\AsistenciaSearch $searchModel */
/** @var frontend\controllers\AsistenciaController $categories */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Asistencias';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="asistencia-index">
<!-- Muestra el GridView dentro de un widget Pjax -->
<?php Pjax::begin(['id' => 'mi-gridview', 'enablePushState' => false]); ?>
<?= print_r($dataProvider->getModels()) ?>
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
                    ];
                }
            ],
        ],
    ]); ?>

    <!-- Formulario para enviar los datos al controlador -->
    <?php $form = ActiveForm::begin(['action' => ['guardar-asistencia']]); ?>
        <!-- Agrega el token CSRF para protegerse contra ataques CSRF -->
        <?= Html::hiddenInput(Yii::$app->request->csrfParam, Yii::$app->request->csrfToken) ?>

        <!-- Agrega los campos de entrada ocultos para los datos de alumno y asiste -->
        <div style="display:none">
            <?php foreach ($dataProvider->getModels() as $model) : ?>
                <?= Html::hiddenInput('alumnos[]', $model->alumno) ?>
                <?= Html::hiddenInput('asistencias[]', 0, ['class' => 'asiste']) ?>
            <?php endforeach ?>
        </div>

        <!-- Botón para enviar los datos al controlador -->
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-primary']) ?>
    <?php ActiveForm::end(); ?>

    <!-- Registra el código JavaScript para guardar los datos -->
    <?php
        $js = <<<JS
            $('input[name="asiste"]').change(function() {
                // Encuentra la fila correspondiente al checkbox
                var row = $(this).closest('tr');
                
                // Obtiene el valor de la columna "alumno"
                var alumno = row.find('td:eq(1)').text();
                
                // Obtiene el valor del checkbox "asiste"
                var asiste = $(this).is(':checked') ? 1 : 0;
                
                // Actualiza el valor del campo de entrada correspondiente
                row.find('input.asiste').val(asiste);
            });
            
            $('form').on('submit', function() {
                // Envía el formulario utilizando AJAX
                $.ajax({
                    url: $(this).attr('action'),
                    type: 'POST',
                    data: $(this).serialize(),
                    success: function() {
                        // Recarga el GridView después de guardar los datos
                        $.pjax.reload({container: '#mi-gridview'});
                    }
                });
                
                return false;
            });
        JS;
        $this->registerJs($js);
    ?>

<?php Pjax::end(); ?>

</div>