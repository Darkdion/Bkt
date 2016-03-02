<?php
$params = array_merge(

    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),

    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);
Yii::setAlias('@themes',dirname(__DIR__).'/themes');
return [

    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [
        'gridview' =>  [
            'class' => '\kartik\grid\Module'
            ]
    ],
    

    'components' => [

        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
           // 'enableSession' => true,
           // 'authTimeout' => 20,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
    ],
    'params' => $params,
];
