<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var backend\models\Profesor $model */

$this->title = $model->PROFESOR;
$this->params['breadcrumbs'][] = ['label' => 'Profesors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="profesor-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'PROFESOR' => $model->PROFESOR], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'PROFESOR' => $model->PROFESOR], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'PROFESOR',
            'CEDULA',
            'NOMBRES',
            'DESCRIPCION',
            'DIRECCION',
            'TELEFONO',
            'FECHA_NACIMIENTO',
            'FOTO',
            'CORREO',
            'CLAVE',
            'HOJAVIDA',
            'AREA',
            'ESTADO',
        ],
    ]) ?>

</div>
