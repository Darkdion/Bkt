<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class ThemesAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
          'gentelella/fonts/css/font-awesome.min.css',
        'font/font-awesome-animation.min.css',
        'gentelella/css/animate.min.css',

        'gentelella/css/custom.css',
        'gentelella/css/maps/jquery-jvectormap-2.0.1.css',
        'gentelella/css/icheck/flat/green.css',
        'gentelella/css/floatexamples.css',



    ];
    public $js = [
        //'gentelella/js/chartjs/chart.min.js',
//        //'gentelella/js/progressbar/bootstrap-progressbar.min.js',
//        'gentelella/js/nicescroll/jquery.nicescroll.min.js',
//        'gentelella/js/icheck/icheck.min.js',
//        //'gentelella/js/gauge/gauge.min.js',
//       // 'gentelella/js/gauge/gauge_demo.js',
//        'gentelella/js/moment.min2.js',
      //  'gentelella/js/datepicker/daterangepicker.js',
//       // 'gentelella/js/sparkline/jquery.sparkline.min.js',
//
//
        //'gentelella/js/skycons/skycons.js',
//
//        'gentelella/js/flot/jquery.flot.js',
//        'gentelella/js/flot/jquery.flot.pie.js',
//        'gentelella/js/flot/jquery.flot.orderBars.js',
//        'gentelella/js/flot/jquery.flot.time.min.js',
//        'gentelella/js/flot/date.js',
//        'gentelella/js/flot/jquery.flot.spline.js',
//        'gentelella/js/flot/jquery.flot.stack.js',
//        'gentelella/js/flot/curvedLines.js',
//        'gentelella/js/flot/jquery.flot.resize.js',
//        'gentelella/js/notify/pnotify.core.js',
//          'gentelella/่js/notify/pnotify.buttons.js',
//            'gentelella/js/notify/pnotify.nonblock.js',
        'gentelella/js/custom.js',

    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
