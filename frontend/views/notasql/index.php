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
                'MATERIA',
                'P1Q1',
                'P2Q1',
                'EQUIV80',
                'EV_QUIM',
                'EQUIV20',
                'PROM_QUI',
                'EQ_CUAL',
                'COMP',
                'NF',
            ],
        ]);
        ?>
       <?= Html::a('Guardar', ['create', 'criterio' => $criterio], ['class' => 'btn btn-success']) ?>
</div>