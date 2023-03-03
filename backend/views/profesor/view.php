<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap\Alert;
use yii\web\Session;

$session = Yii::$app->getSession();
if ($session->hasFlash('error')) {
    echo Alert::widget([
        'options' => [
            'class' => 'alert-danger',
        ],
        'body' => $session->getFlash('error'),
    ]);
}
/** @var yii\web\View $this */
/** @var backend\models\Profesor $model */

$this->title = $model->PROFESOR;
$this->params['breadcrumbs'][] = ['label' => 'Listado de Profesores', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<div class="profesor-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'PROFESOR' => $model->PROFESOR], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'PROFESOR' => $model->PROFESOR], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Esta seguro de eliminar al docente?',
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
