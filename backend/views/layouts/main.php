<?php

/** @var \yii\web\View $this */
/** @var string $content */

use backend\assets\AppAsset;
use common\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<header>
    <?php
    $this->registerCssFile('@web/css/site.css');
    NavBar::begin([
        //'brandImage' => Yii::getAlias('@web/imagenes/logo.png'),
        // 'brandLabel' => Yii::$app->name,
        // 'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-expand-md navbar-dark  fixed-top',
            'style' => 'background-color: #2d572c;',
        ],
    ]);
    echo Html::a(
        Html::img(Yii::getAlias('@web/imagenes/logo.png'), ['alt' => 'Logo', 'width' => '45']),

        Yii::$app->homeUrl,
        ['class' => 'navbar-inverse navbar-fixed-top, style="font-weight:bold; color:black;"']
    );
    $menuItems = [
        //Llama al controlador
        ['label' => 'Inicio', 'url' => ['/site/index']],
        ['label' => 'Alumno', 'url' => ['/alumno/index']],
        ['label' => 'Profesor', 'url' => ['/profesor/index']],
        ['label' => 'Curso', 'url' => ['/curso/index']],
        ['label' => 'Materia', 'url' => ['/materia/index']],
        ['label' => 'Periodo', 'url' => ['/periodo/index']],
        ['label' => 'Matricula', 'url' => ['/matricula/index']],
        ['label' => 'Asignación', 'url' => ['/materiacurso/index']],
    ];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Iniciar Sesion', 'url' => ['/site/login']];
    }     
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav me-auto mb-2 mb-md-0'],
        'items' => $menuItems,
    ]);
    if (Yii::$app->user->isGuest) {
        echo Html::tag('div',Html::a('Login',['/site/login'],['class' => ['btn btn-link login text-decoration-none']]),['class' => ['d-flex']]);
    } else {
        echo Html::beginForm(['/site/logout'], 'post', ['class' => 'd-flex'])
            . Html::submitButton(
                'Cerrar sesion (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout text-decoration-none']
            )
            . Html::endForm();
    }
    NavBar::end();
    ?>
</header>

<main role="main" class="flex-shrink-0">
    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>

<footer class="footer mt-auto py-3 text-muted">
    <div class="container">
        <p class="float-start">&copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></p>
        <p class="float-end"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage();
