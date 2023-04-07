<?php
use yii\filters\AccessControl;

$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'modules' => [
        'gridview' =>  [
             'class' => '\kartik\grid\Module',
             // your other grid module settings
         ],
        'gridviewKrajee' =>  [
             'class' => '\kartik\grid\Module',
             // your other grid module settings
         ]
        ],

    'id' => 'app-frontend',
    'name' => 'Escuela',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-frontend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => \yii\log\FileTarget::class,
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'editable' => [
            'class' => 'kartik\editable\EditableConfig',
        ],
    ],
    'params' => $params,
    'controllerMap' => [
        'grid' => [
            'class' => 'kartik\grid\GridView',
            'behaviors' => [
                'access' => [
                    'class' => AccessControl::class,
                    'only' => ['grid-data'], // acción a controlar
                    'rules' => [
                        [
                            'allow' => true,
                            'roles' => ['@'],
                        ],
                    ],
                ],
            ],
        ],
    ],
];
