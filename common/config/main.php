<?php
use kartik\mpdf\Pdf;
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'language'=>'th_TH', // เปิดใช้งานภาษาไทย
     'timezone'=>'Asia/Bangkok',
    'components' => [

        'authManager' => [
            'class' => 'yii\rbac\DbManager',
        ],
        'pdf' => [
            'class' => Pdf::classname(),
            'format' => Pdf::FORMAT_A4,
            'orientation' => Pdf::ORIENT_PORTRAIT,
            'destination' => Pdf::DEST_BROWSER,
            ],
        'thaiFormatter'=>[
            'class'=>'dixonsatit\thaiYearFormatter\ThaiYearFormatter',
        ],

        'formatter' => [
          'dateFormat' => 'dd/MM/yyyy',
          'decimalSeparator' => ',',
          'thousandSeparator' => ' ',
          'currencyCode' => 'EUR',


        ],

//        'urlManager' => [
//            'class' => 'yii\web\UrlManager',
//            // Disable pay.php
//            'showScriptName' => false,
//            // Disable r= routes
//            'enablePrettyUrl' => true,
//            'rules' => [
//                '<controller:\w+>/<id:\d+>' => '<controller>/view',
//                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
//                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
//                ['class' => 'yii\rest\UrlRule', 'controller' => 'location', 'except' => ['delete','GET', 'HEAD','POST','OPTIONS'], 'pluralize'=>false],
//                '<module:\w+>/<controller:\w+>/<action:\w+>' => '<module>/<controller>/<action>',
//            ],
//        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
    ],
];
