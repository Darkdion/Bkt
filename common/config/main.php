<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'language'=>'th,TH',
    'components' => [

        'urlManager' => [
//           'enablePrettyUrl' => true,
//            'showScriptName' => false,
            //'enableStrictParsing' => true,
//            'suffix' => '.net',
            'rules' => [
                'img'=>'web-img/index',
                'newscategories'=>'newscategories/index',
                'news'=>'web-news/index',
                'course'=>'web-course/index',
                'contact'=>'web-contact/index',
                'home' => 'site/index',
                'สมัครสมาชิก' => '/register/index',
                'เข้าสู่ระบบ' => 'site/login',



//                'POST <controller:\w+>s' => '<controller>/create',
//                '<controller:\w+>s' => '<controller>/index',
//
//                'PUT <controller:\w+>/<id:\d+>'    => '<controller>/update',
//                'DELETE <controller:\w+>/<id:\d+>' => '<controller>/delete',
//                '<controller:\w+>/<id:\d+>'        => '<controller>/view',
            ],
        ],

        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
    ],
];
