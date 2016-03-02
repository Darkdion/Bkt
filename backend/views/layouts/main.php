<?php

/* @var $this \yii\web\View */
/* @var $content string */
use kartik\widgets\Growl;
use backend\assets\ThemesAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
use yii\helpers\Url;

use common\models\Student;
ThemesAsset::register($this);
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
</head>
<body class="nav-md">
<?php $this->beginBody() ?>



<div class="container body">


    <div class="main_container">

        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">

                <div class="navbar nav_title" style="border: 0;">
                    <a href="<?= \yii\helpers\Url::to(['site/manager'])?>" class="site_title"><i class="fa fa-database"></i> <span>แอดมิน</span></a>
                </div>
                <div class="clearfix"></div>

                <!-- menu prile quick info -->
                <div class="profile">
                    <div class="profile_pic">
                        <img src="<?=Url::base().'/img/manager.png'; ?>" alt="..." class="img-circle profile_img">
                    </div>
                    <div class="profile_info">
                        <span><h4>ยินดีต้อนรับ</h4></span>
                        <h2><?= Yii::$app->user->identity->username?></h2>
                    </div>
                </div>
                <!-- /menu prile quick info -->

                <br />

                <!-- sidebar menu -->
<?= $this->render('menuleft')?>
                <!-- /sidebar menu -->

                <!-- /menu footer buttons -->
                <div class="sidebar-footer hidden-small">
                    <a data-toggle="tooltip" data-placement="top" title="Settings">
                        <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                        <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="Lock">
                        <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="Logout">
                        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                    </a>
                </div>
                <!-- /menu footer buttons -->
            </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">

            <div class="nav_menu">
                <nav class="" role="navigation">
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>
                    <ul class="nav navbar-nav navbar-right">

                        <li class="">
                            <a href="<?=Url::to(['site/logout']) ?>" data-method="post" data-confilm="" class="  user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-power-off"></i> ออกจากระบบ

                            </a>

                        </li>
                        <li role="presentation" class="dropdown">
                            <a href="<?=Url::toRoute('payment/paytotall')?>" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                                <i class="btn btn-danger fa fa-shopping-cart"> ยังไม่ชำระ </i>  <span class="badge bg-orange"><?= \common\models\RegisterCourse::find()->where(['status'=>0])->count();?></span>

                            </a>


                        </li>
<li>
    <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
        <i class="btn btn-success fa fa-envelope-o"> ชำระแล้ว </i>  <span class="badge bg-green"><?= \common\models\RegisterCourse::find()->where(['status'=>1])->count();?></span>

    </a>
</li>

                    </ul>

                </nav>
            </div>

        </div>
        <!-- /top navigation -->
        <div class="right_col" role="main">
            <br>
            <br>

            <!-- top tiles -->

            <div class="row tile_count">
                <div class="container">
                    <?= Breadcrumbs::widget([
                        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                    ]) ?>

                    <?php foreach (Yii::$app->session->getAllFlashes() as $message):; ?>
                        <?php

                        echo Growl::widget([
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
                      <?= Alert::widget() ?>
                    <?= $content ?>
                </div>

            </div>

        </div>
        <!-- /top tiles -->










        <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
