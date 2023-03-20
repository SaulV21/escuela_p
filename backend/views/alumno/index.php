<?php

use backend\models\Alumnos;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\AlumnoSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Listado de los Alumnos';
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="alumnos-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Ingresar Alumnos', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute'=>'ALUMNO',
                'contentOptions' => ['style' => 'text-align: center; width: 95px;']
            ],
            [
                'attribute'=>'CEDULA',
                'contentOptions' => ['style' => 'text-align: center; width: 45px;']
            ],
            'NOMBRES',
            'APELLIDOS',
           //'FECHA_NACIMIENTO',
            //'CIUDAD_NACIMIENTO',
            //'SEXO',
            //'PADRE',
            //'PROFESION_PADRE',
            //'MADRE',
            //'PROFESION_MADRE',
            //'CIUDADRES',
            //'DIRECCION:ntext',
            'TELEFONO',
            //'CONTACTO',
            //'REFERENCIA',
            'CORREO',
            //'FOTO',
            [
                'header'=>'Foto',
                'format'=>'html',
                'value'=>function($data){
                    return Html::img($data->FOTO,['width'=>'60px']);
                },
            ],
            //'SISRES',
            //'SISFECHA',
            //'CSLTKO',
            [
                'header'=>'Acciones',
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Alumnos $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'ALUMNO' => $model->ALUMNO]);
                 }
            ],
        ],
        'headerRowOptions' => ['style' => 'text-align:center;'],
        'layout'=>"{summary}\n{items}\n{pager}"
    ]); ?>


</div>
