<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var backend\models\Alumnos $model */

$this->title = $model->ALUMNO;
$this->params['breadcrumbs'][] = ['label' => 'Alumnos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="alumnos-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'ALUMNO' => $model->ALUMNO], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'ALUMNO' => $model->ALUMNO], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Estas seguro/a de eliminarlo?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ALUMNO',
            'CEDULA',
            'NOMBRES',
            'APELLIDOS',
            'FECHA_NACIMIENTO',
            'CIUDAD_NACIMIENTO',
            'SEXO',
            'PADRE',
            'PROFESION_PADRE',
            'MADRE',
            'PROFESION_MADRE',
            'CIUDADRES',
            'DIRECCION:ntext',
            'TELEFONO',
            'CONTACTO',
            'REFERENCIA',
            'CORREO',
            'FOTO',
            'SISRES',
            'SISFECHA',
            'CSLTKO',
        ],
    ]) ?>

</div>
