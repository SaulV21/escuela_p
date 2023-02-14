<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var frontend\models\Notasql $model */

$this->title = 'Ingresar Notas';
$this->params['breadcrumbs'][] = ['label' => 'Notasqls', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="notasql-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
