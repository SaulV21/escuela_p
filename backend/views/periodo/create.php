<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\Periodo $model */

$this->title = 'Crear un nuevo Periodo Lectivo';
$this->params['breadcrumbs'][] = ['label' => 'Periodos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<head>
    <link rel="stylesheet" type="text/css" href="css/site.css">
</head>
<div class="periodo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
