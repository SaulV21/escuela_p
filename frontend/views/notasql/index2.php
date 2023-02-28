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

    <p>
        <?= Html::a('Ingresar Notas', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

     <div class="dropdown">
    <?php
        $form = ActiveForm::begin();
        ?>
        <?= $form->field($model, 'MATERIA')->dropDownList($materias,['prompt' => 'Seleccione la materia.'])?>
        <?= 
        // echo Html::dropDownList('MATERIA', null, Materias::getList(),
        //     [
        //         'prompt' => 'Seleccione la materia.',
        //         'class' => 'form-control',
        //         'onchange' => 'this.form.submit()',
        //     ]
        // );
        GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                'MATERIA',
                'MATRICULA',
                'P1Q1',
            ],
        ]);
        ?>
       <?php ActiveForm::end();
    ?>

<!-- </div> 

 

</div> -->
