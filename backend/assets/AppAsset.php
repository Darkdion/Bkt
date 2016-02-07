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
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
       // 'themes/dist/css/bootstrap-switch.css',
      'themes/assets/css/theme-default/bootstrap.css?1422792965',


        'themes/assets/css/theme-default/materialadmin.css?1425466319',
//        'themes/assets/css/theme-2/materialadmin.css?1425466319',

         'themes/assets/css/theme-default/font-awesome.min.css?1422529194',
         'themes/assets/css/theme-default/material-design-iconic-font.min.css?1421434286',
         'themes/assets/css/theme-default/libs/rickshaw/rickshaw.css?1422792967',
         'themes/assets/css/theme-default/libs/morris/morris.core.css?1420463396',
        'themes/assets/css/theme-default/libs/summernote/summernote.css?1425218701',
        'themes/dist/css/font-awesome-animation.css',

     ];
     public $js = [

//         'themes/assets/js/libs/jquery/jquery-1.11.2.min.js',
         'themes/assets/js/libs/jquery/jquery-migrate-1.2.1.min.js',
         //'themes/assets/js/libs/bootstrap/bootstrap.min.js',
         'themes/assets/js/libs/spin.js/spin.min.js',
         'themes/assets/js/libs/autosize/jquery.autosize.min.js',
         'themes/assets/js/libs/moment/moment.min.js',



         'themes/assets/js/libs/flot/jquery.flot.min.js',
         'themes/assets/js/libs/flot/jquery.flot.time.min.js',
         'themes/assets/js/libs/flot/jquery.flot.resize.min.js',
         'themes/assets/js/libs/flot/jquery.flot.orderBars.js',
         'themes/assets/js/libs/flot/jquery.flot.pie.js',
         'themes/assets/js/libs/flot/curvedLines.js',
         'themes/assets/js/libs/jquery-knob/jquery.knob.min.js',
         'themes/assets/js/libs/sparkline/jquery.sparkline.min.js',
         'themes/assets/js/libs/nanoscroller/jquery.nanoscroller.min.js',
         'themes/assets/js/libs/d3/d3.min.js',
         'themes/assets/js/libs/d3/d3.v3.js',
         'themes/assets/js/libs/rickshaw/rickshaw.min.js',
         'themes/assets/js/core/source/App.js',
         'themes/assets/js/core/source/AppNavigation.js',
         'themes/assets/js/core/source/AppOffcanvas.js',
         'themes/assets/js/core/source/AppCard.js',
         'themes/assets/js/core/source/AppForm.js',
         'themes/assets/js/core/source/AppNavSearch.js',
         'themes/assets/js/core/source/AppVendor.js',
         'themes/assets/js/core/demo/Demo.js',
         //'themes/assets/js/core/demo/DemoDashboard.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
