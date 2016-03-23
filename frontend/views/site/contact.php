<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'ติดต่อเรา';
$this->params['breadcrumbs'][] = $this->title;
$model = \common\models\WebContact::find()->all();

?>
<link href="assetss/common/js/plugin/fancybox/jquery.fancybox8cbb.css?v=2.1.5" rel="stylesheet" media="screen"/>
<link href="assetss/contact/css/contact.css" rel="stylesheet">
<header class="hMain">
    <h2 class="wrapHead">ติดต่อเรา&nbsp;<span class="txtColr">บ้านครูติ๊กติวเตอร์</span></h2>
</header>
<article id="contact" class="tem-bodyContent">
    <header class="wrapHead">
        <?php foreach ($model as $models): ?>

        <h2>ช่องทางในการติดต่อ <span class="txtColr"><?php echo $models->name ?></span></h2>
    </header>

    <div id="head-office‎" class="wrapContact wrapper">
        <address>
            <div class="detail-adr">
                <p class="branch-name" style="font-size: 20pt; font-family: 'meregular';"><i
                        class="fa fa-clock-o txtColr"></i> เวลาทำการ..</p>
                <span style="font-size: 18pt; font-family: 'meregular';">
                <b>เรียนวัน</b> จันทร์.- พฤหัสบดี. <br>

               <b> เวลา</b> 17.00-18.30 น.
                </span>

                <p class="branch-name" style="font-size: 20pt; font-family: 'meregular';"><i
                        class="fa fa-home txtColr"></i> ที่อยู่..</p>
                <span style="font-size: 18pt; font-family: 'meregular';"> <?php echo $models->detail ?></span>
                <br>
                <br>
                <p class="branch-name" style="font-size: 20pt; font-family: 'meregular';"><i
                        class="fa fa-credit-card txtColr"></i> เลขที่บัญชี..</p>
                <span style="font-size: 18pt; font-family: 'meregular';">ธนาคาร &nbsp;&nbsp;: กรุงไทย </span> <br>
                <span style="font-size: 18pt; font-family: 'meregular';">ชื่อบัญชี    &nbsp;: Wanwimon Ruamkool </span> <br>
                <span style="font-size: 18pt; font-family: 'meregular';">เลขบัญชี   &nbsp;:946-2-03545-1</span>
            </div>
        </address>
        <?php endforeach; ?>
    </div>
</article>
