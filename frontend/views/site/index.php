<?php
use yii\helpers\Html;
/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */
$this->title = 'My Yii Application';
?>
<div class="site-index">
    <div class="p-5 mb-4 bg-transparent rounded-3">
        <div class="container-fluid py-5 text-center">
            <h1 class="display-4">Bienvenido</h1>
            <p class="fs-5 fw-light">Sistema Educativo Integral</p>
            <!--            <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p>-->
        </div>
    </div>

    <div class="body-content">
        <div class="row">
            <?php
            foreach ($dataProvider->getModels() as $row){
                ?>
                <div class="col-lg-4">
                    <h2><?= $row['CURSO']?></h2>

                    <p><?= $row['DESCRIPCION']?></p>

                    <p>
                        <!-- <a class="btn btn-primary" href="http://www.yiiframework.com/doc/">CALIFICACIÓN</a> -->
<!--                        <a class="btn btn-success" href="http://www.yiiframework.com/doc/">ASISTENCIA</a>-->

                        <?= Html::a('Asistencia',['/asistencia/index','criterio'=>$row['CURSO']],['class' => 'btn btn-primary'])?>
                        <?= Html::a('CALIFICACIÓN',['/notasql/index','criterio'=>$row['CURSO']],['class' => 'btn btn-primary'])?>
                    </p>
                </div>

            <?php }?>
        </div>
    </div>
</div>