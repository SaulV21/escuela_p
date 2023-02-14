<?php

use frontend\models\Notasql;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\bootstrap\Dropdown;
/** @var yii\web\View $this */
/** @var frontend\models\NotasqlSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Registrar Notas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="notasql-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Ingresar Notas', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <div class="dropdown">
    <a  data-toggle="dropdown" class="dropdown-toggle">Label </b></a>
    <?php
        echo Dropdown::widget([
            'items' => [
                ['label' => 'DropdownA', 'url' => '../views/asistencia/index'],
                ['label' => 'DropdownB', 'url' => '/asistencia/index'],
            ],
        ]);
    ?>
</div>
  

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'MATRICULA',
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
    
            [
                'header'=>'Acciones',
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Notasql $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'MATRICULA' => $model->MATRICULA, 'MATERIA' => $model->MATERIA]);
                 }
            ],
        ],
    ]); ?>


</div>
