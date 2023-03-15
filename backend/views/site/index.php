<?php
use yii\helpers\Html;
use yii\bootstrap\BootstrapAsset;
use yii\web\YiiAsset;
use backend\assets\AppAsset;

// Cargar tus propios CSS personalizados
AppAsset::register($this);
/** @var yii\web\View $this */

$this->title = 'Escuela';
?>
<?php $this->beginPage() ?>

<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <link rel="stylesheet" href="path/to/style.css">
</head>
<body class="slide-up">

<?php $this->beginBody() ?>

<!-- Contenido de la página -->
<div class="site-index">
    <div class="p-5 mb-4 bg-transparent rounded-3">
        <div class="container-fluid py-5 text-center">
            <h1 class="display-4">Bienvenido</h1>
            <p class="fs-5 fw-light">Sistema Educativo Integral</p>
            <!--            <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p>-->
        </div>
    </div>

<?php $this->endBody() ?>
<!-- <script>
    $(document).ready(function() {
        $('body').addClass('show');
    });
</script> -->
</body>
</html>

<?php $this->endPage() ?>

