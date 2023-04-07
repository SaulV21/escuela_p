<?php

use frontend\models\Notasql;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\widgets\ActiveForm;
use yii\grid\GridView;
use yii\bootstrap\Dropdown;
use yii\web\JsExpression;
use yii\helpers\ArrayHelper;
use backend\models\Materias;
use backend\models\Alumnos;
//use kartik\grid\EditableColumn;
use yii\widgets\Pjax;
use kartik\editable\Editable;
/** @var yii\web\View $this */
/** @var frontend\models\NotasqlSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Registrar Notas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="notasql-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?=GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                'alumno',
                'nombres',
                'apellidos',
                'materia',
                [
                    'attribute' => '1 parcial',
                    'format' => 'raw',
                    'value' => function ($model) {
                        return Editable::widget([
                            'name' => '1 parcial',
                            'value' => $model['1 parcial'],
                            'asPopover' => true,
                            'header' => '1 parcial',
                            'inputType' => 'text',
                            'placement' => 'right',
                            'editableValueOptions' => [
                                'class' => 'text-success'
                            ],
                            'options' => [
                                'class' => 'editable',
                                'data-url' => Yii::$app->urlManager->createUrl(['controller/update']),
                                'data-pk' => $model['alumno'],
                                'data-name' => 'p1q1',
                            ],
                        ]);
                    }
                ],
                [
                    'attribute' => '2 parcial',
                    'format' => 'raw',
                    'value' => function ($model) {
                        return Editable::widget([
                            'name' => '2 parcial',
                            'value' => $model['2 parcial'],
                            'asPopover' => true,
                            'header' => '2 parcial',
                            'inputType' => 'text',
                            'placement' => 'right',
                            'editableValueOptions' => [
                                'class' => 'text-success'
                            ],
                            'options' => [
                                'class' => 'editable',
                                'data-url' => Yii::$app->urlManager->createUrl(['controller/update']),
                                'data-pk' => $model['alumno'],
                                'data-name' => 'p2q1',
                            ],
                        ]);
                    }
                ],
                'equiv80',
                'Examen',
                'equiv20',
                'Promedio',
                'eq_cual',
                'Comportamiento',
                'Nota Final',
            ],
        ]);
        ?>

        
    
       <?= Html::a('Guardar', ['create', 'criterio' => $criterio], ['class' => 'btn btn-success']) ?>
</div>
<div>
<!-- <?=GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                'alumno',
                'nombres',
                'apellidos',
                'materia',
                '1 parcial',
                '2 parcial',
                'equiv80',
                'Examen',
                'equiv20',
                'Promedio',
                'eq_cual',
                'Comportamiento',
                'Nota Final',
            ],
        ]);
        ?> -->
</div>