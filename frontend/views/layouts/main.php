<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
AppAsset::register($this);
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



    <link rel="stylesheet" type="text/css" href="3D/css/jquery-responsiveGallery.css">



    <link href="assetss/css/reset.css" rel="stylesheet" />
    <link href="assetss/common/js/plugin/mediaelement/mediaelementplayer.css" rel="stylesheet" />
    <link href="users/css/font-awesome.min.css" rel="stylesheet" />

    <link href="assetss/css/tmbme.css" rel="stylesheet" />

    <link href="assetss/css/main.css" rel="stylesheet" />
    <link href="assetss/themes/pack.css" rel="stylesheet" />
    <link href="assetss/css/tmbme-responsive.css" rel="stylesheet" type="text/css" />


    <link href="css/bootstrap.css" rel="stylesheet" />

    <meta name="theme-color" content="#DF006E">
</head>
  
<body class="theme-pack color-deepPink">
<?php $this->beginBody() ?>

<div id="modeScreen"></div>
<!-- ############  HEADER  ########### -->
<header id="header" class="setBorderColor">
    <div id="high-notification">
        <div class="wrapper">

            <span class="submit"> <a class="btn close-note" href="#">ปิดการแจ้งเตือน</a> </span>
            <div class="clearAll"></div>
        </div>
    </div>
    <div class="wrapHead">
        <figure id="mainLogo"><a href="<?=\yii\helpers\Url::to(['site/index'])?>" class="logo"><img src="../web/logo/logo.png" alt="ME Corporate Logo"/></a></figure>
        <!-- Main Menu -->
        <nav id="navMainMenu">
            <ul>
                <li><a href="<?=\yii\helpers\Url::to(['site/index'])?>">หน้าหลัก</a></li>
                <li><a href="<?=\yii\helpers\Url::to(['site/couse'])?>">คอร์สเรียน</a></li>
                <li><a href="<?=\yii\helpers\Url::to(['site/hod'])?>">วิธีลงทะเบียนคอร์ส</a></li>
                <li><a href="<?= \yii\helpers\Url::to(['site/contact'])?>">ติดต่อเรา</a></li>

            </ul>
        </nav>
        <nav id="navMenuMobile" class="navMenuMobile">
            <button class="miniBTN">MENU</button>
            <ul class="subNavMenu">
                <li><a href="<?=\yii\helpers\Url::to(['site/index'])?>">หน้าหลัก</a></li>
                <li><a href="<?=\yii\helpers\Url::to(['site/couse'])?>">คอร์สเรียน</a></li>
                <li><a href="account/index.html">วิธีลงทะเบียนคอรส</a></li>
                <li><a href="<?= \yii\helpers\Url::to(['site/contact'])?>">ติดต่อเรา</a></li>

            </ul>
        </nav>
        <?php if(Yii::$app->user->isGuest):?>

            <a class="btn  topBtnOpenAccount" href="<?= \yii\helpers\Url::to(['signup/index'])?>"  > <span class="ico-ibAccount"></span>สมัครสมาชิก </a>
            <a class="btn topBtnLogin" href="<?=\yii\helpers\Url::to(['site/login'])?>" > <span class="ico-ibLogin"></span>เข้าสู่ระบบ </a>
        <?php else: ?>

            <a class="btn  topBtnOpenAccount"   href="<?=\yii\helpers\Url::to(['/site/logout']) ?>" data-method="post" > <span class="fa fa-sign-out"></span> ออกจากระบบ </a>
            <a class="btn topBtnLogin " href="<?=\yii\helpers\Url::to(['site/users'])?>" > <span class="fa fa-shopping-cart"></span> ลงทะเบียน </a>


        <?php endif; ?>

        <div class="clearAll"></div>
    </div>
</header>

<!-- ############  CONTENT  ########### -->
<section id="main">
    <?php foreach (Yii::$app->session->getAllFlashes() as $message):; ?>
        <?php

        echo \kartik\widgets\Growl::widget([
            'type' => (!empty($message['type'])) ? $message['type'] : 'danger',
            'title' => (!empty($message['title'])) ? Html::encode($message['title']) : 'Title Not Set!',
            'icon' => (!empty($message['icon'])) ? $message['icon'] : 'fa fa-info',
            'body' => (!empty($message['message'])) ? Html::encode($message['message']) : 'Message Not Set!',
            'showSeparator' => true,
            'delay' => 1, //This delay is how long before the message shows
            'pluginOptions' => [
                'delay' => (!empty($message['duration'])) ? $message['duration'] : 3000, //This delay is how long the message shows for
                'placement' => [
                    'from' => (!empty($message['positonY'])) ? $message['positonY'] : 'top',
                    'align' => (!empty($message['positonX'])) ? $message['positonX'] : 'right',
                ]
            ]
        ]);
        ?>
    <?php endforeach; ?>
    <?= $content ?>
</section>
<?php

function TelFormat($mobile){
    $minus_sign = "-" ;   // กำหนดเครื่องหมาย
    $part1 = substr ( $mobile , 0 , -7 ) ;  // เริ่มจากซ้ายตัวที่ 1 ( 0 ) ตัดทิ้งขวาทิ้ง 7 ตัวอักษร ได้ 085
    $part2 = substr( $mobile , 3 , -3 ) ;  // เริ่มจากซ้าย ตัวที่ 4 (9) ตัดทิ้งขวาทิ้ง 3 ตัวอักษร ได้ 9490
    $part3 = substr( $mobile , 7 ) ; // เริ่มจากซ้าย ตัวที่ 8 (8) ไม่ตัดขวาทิ้ง ได้ 862
    $a=$part1. $minus_sign . $part2 . $minus_sign . $part3 ;
    return $a;
}

//echo TelFormat("0895742145"); //การเรียกใช้งาน
?>





<!-- ############  FOOTER  ########### -->
<div id="barFooter" class="infoBar">
    <?php $model= \common\models\WebContact::find()->all();?>
    <div class="wrapper">
        <p class="title">
            <b>เวลาทำการ</b><br>
           เรียนวัน จันทร์.- พฤหัสบดี. <br>
           เวลา 17.00-18.30 น.
        </p>
        <?php foreach($model as $models ): ?>
<?php $phone=$models->phone?>
        <p class="callcenter"><span class="ico sprite ico-tell"></span>
            <a href="tel:<?= $models->phone ?>" class="link-call">โทรสอบถามได้ที่เบอร์ :
                <span><?= TelFormat($models->phone) ?></span>
            </a>
        </p>
        <p class="btn-right">

            <a  target="_blank" href="<?= $models->facebook ?>" class="btn-chat">สอบถามได้ที่นี้</a></p>
    </div>
</div>
<?php endforeach; ?>


<footer id="footer">
    <!-- -->

    <div class="bound-backTop" style="display:none"><a id="moveTop" href="javascript:moveTop();">BACK TO TOP</a></div>
    <!-- Footer Bottom -->
    <div id="footer-bottom">
        <div class="wrapper wrapFooter">
            <div class="shortcutbar"> <a href="<?= $models->facebook ?>" target="_blank">
                    <h4>Fcebook</h4>
                    <p><span class="fa fa-facebook"></span></p>
                </a> </div>
            <div class="shortcutbar">
                <h4><a class="link-call" href="tel:<?= $models->phone ?>">โทรสอบถาม...</a></h4>
                <p><span class="ico-tel"></span><a class="link-call" href="tel:<?= $models->phone ?>"><?= TelFormat($models->phone) ?></a></p>
            </div>
            <div class="shortcutbar"> <a href="<?= \yii\helpers\Url::to(['site/contact'])?>">
                    <h4>ติดต่อเรา</h4>
                    <p><span class="fa fa-location-arrow"></span>ติดต่อเรา</p>
                </a> </div>
            <div class="enews footer-group">


            </div>

            <!-- social-footer -->
            <div class="social-footer center footer-group">

            </div>
            <div class="copyright footer-group">
                <p><img id="logo-footer" src="../web/logo/logo.png" alt="ME Logo"></p>
                <small>สงวนลิขสิทธิ์ พ.ศ.<?php echo date('Y')+543;?> สถาบัญกวดวิชาบ้านครูติ๊กคิวเตอร์</small> </div>
        </div>
    </div>
</footer>
<script>
    var _root = "site/index.php";
    var site_url = "index.php";
</script>
<div class="print-footer-copy"> (c) สงวนลิขสิทธิ์ พ.ศ.<?php echo date('Y')+543;?>  สถาบัญกวดวิชาบ้านครูติ๊กคิวเตอร์</div>
<script>
    var _root = "site/index.php";
    var site_url = "index.php";
</script>
<div class="print-footer-copy"> (c) สงวนลิขสิทธิ์ พ.ศ.<?php echo date('Y')+543;?>  สถาบัญกวดวิชาบ้านครูติ๊กคิวเตอร์</div>

<!-- Google Code for Remarketing Tag -->


<noscript>

</noscript>
<!-- JS Script -->

<script src="assetss/common/js/jquery/jquery-1.8.3.min.js"></script>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>
<script src="assetss/common/js/jquery/jquery.swipe.min.js"></script>
<script src="assetss/common/js/jquery/jquery.easing.1.3.js"></script>


<script src="assetss/common/js/plugin/mediaelement/mediaelement-and-player.min.js"></script>
<script src="assetss/common/js/global/global.js"></script>

<script src="assetss/common/js/asset/player.js" rel="player"></script>
<script type="text/javascript" src="3D/lib/modernizr.custom.js"></script>

<script type="text/javascript" src="3D/src/jquery.responsiveGallery.js"></script>
<script type="text/javascript">
    $(function () {
        $('.responsiveGallery-wrapper').responsiveGallery({
            animatDuration: 400, //动画时长 单位 ms
            $btn_prev: $('.responsiveGallery-btn_prev'),
            $btn_next: $('.responsiveGallery-btn_next')
        });
    });

</script>
<script>
    $(function(){
        var _root = document.documentElement;
        if(_root.clientWidth>600)_offsetNavTop = $("#navAnchor").height();
        $(window).resize(function(){
            if(_root.clientWidth>600){
                _offsetNavTop = $("#navAnchor").height();
            }else{
                _offsetNavTop = 10;
            }
        });
    });
    $(function(){
        // Nav menu
        (function(window){
            'use strict';

            var _nav = $("#navAnchor li"),
                _obj = $("#navAnchor"), _bound = $("#navAnchor-bound"),
                _list = ["#topic-whatMe","#topic-differenceMe","#topic-whyMe","#topic-moreMe","#barFooter"],
                _tp = -1,
                _max = _list.length,
                _maxH = 0;
            for(var i = 0;i<_max;i++){
                _list[i] = $(_list[i]);
            }
            function viewPage(a){
                var b = a+_offsetNavTop;

                for (var i = _max-1; i>=0; i--){
                    if(_list[i].offset().top<b)return i;
                }
                return -1;
            }
            function moveScroll(){
                _maxH = _list[_max-1].offset().top-_offsetNavTop;
                var _top = $(window).scrollTop(),
                    _index = viewPage(_top),
                    _navIndex = (_index==-1)?0:_index,
                    _minTop = _bound.offset().top-$("header#header").height()+2;

                if((_top>_minTop)&&(_top<_maxH)){
                    _obj.css({
                        'position':'fixed',
                        // 'top':0,
                        'top':$("header#header").height()+2,
                        'height':'auto'
                    });
                }else{
                    _obj.css({ 'position':'absolute', 'top':'auto' });
                    //_obj.css({'height':0});
                }
                if(_tp == _index)return false;

                _obj.find('.active').removeClass('active');
                $(_nav[_navIndex]).addClass('active');
                $("#main").find(".focus").removeClass("focus");
                $(_list[_index]).addClass("focus");
                _tp = _index;
            }
            moveScroll();
            $(window).scroll(moveScroll);

        })(window);
        //
        $("#navAnchor").find("li").click(function(e){
            moveToID($(this).find("a").attr('href'));
            e.preventDefault();
        });
        //
    });
</script>

</body>


</html>
