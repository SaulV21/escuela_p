<?php

use backend\models\Profesor;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\ProfesorSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Profesores';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="profesor-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Ingresar Profesor', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'PROFESOR',
            'CEDULA',
            'NOMBRES',
            'DESCRIPCION',
            'DIRECCION',
            //'TELEFONO',
            //'FECHA_NACIMIENTO',
            //'FOTO',
            [
                'format'=>'html',
                'value'=>function($data){
                    return Html::img($data->FOTO,['width'=>'60px']);
                },
            ],
            //
            [
                'format'=>'html',
                'value'=>function($data){
                    return Html::img($data->HOJAVIDA,['width'=>'60px']);
                },
            ],
            //'CORREO',
            //'CLAVE',
            //'HOJAVIDA',
            //'AREA',
            //'ESTADO',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Profesor $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'PROFESOR' => $model->PROFESOR]);
                 }
            ],
        ],
    ]); ?>


</div>
