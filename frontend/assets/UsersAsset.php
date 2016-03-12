<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class UsersAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [

        'users/css/pace.css',
        //'users/css/bootstrap.min.css',
        'users/css/font-awesome.min.css',
        'font/font-awesome-animation.min.css',
        'users/css/style.css',
        'users/css/plugins.css',
        'users/css/demo.css',
    ];
    public $js = [
        'users/js/pace.js',
        'users/js/bootstrap.min.js',
        'users/js/jquery.slimscroll.min.js',

        'users/js/jquery.popupoverlay.js',

         'users/js/defaults.js',
        'users/js/logout.js',
        'users/js/hisrc.js',
        'users/js/flex.js',
//        'users/js/dashboard-demo.js',
       // 'users/js/wid.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
