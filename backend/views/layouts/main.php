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
                    <?php if (Yii::$app->user->can('Admin')): ?>
                        <a href="<?= \yii\helpers\Url::to(['site/index']) ?>" class="site_title"><i
                                class="fa fa-database"></i> <span>แอดมิน</span></a>
                    <?php else: ?>
                        <a href="<?= \yii\helpers\Url::to(['site/index']) ?>" class="site_title"><i
                                class="fa fa-magnet"></i> <span>พนักงาน</span></a>
                    <?php endif; ?>
                </div>
                <div class="clearfix"></div>

                <!-- menu prile quick info -->
                <!--
                                <!-- /menu prile quick info -->

                <br/>

                <!-- sidebar menu -->
                <?= $this->render('menuleft') ?>
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
                            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown"
                               aria-expanded="false">
                                ผู้ใช้งาน <span
                                    class="label label-success">  <?php echo Yii::$app->user->identity->username ?> </span>
                                <span class=" fa fa-angle-down"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">


                                <li>
                                    <a href="<?= Url::to(['site/logout']) ?>" data-method="post" data-confilm=""
                                       class="  user-profile dropdown-toggle" data-toggle="dropdown"
                                       aria-expanded="false">
                                        <i class="fa fa-power-off"></i> ออกจากระบบ

                                    </a>
                                </li>
                            </ul>
                        </li>
                        <?php
                        $paynotify = \common\models\Paynotify::find()->where(['status' => 1])->count();

                        $register = \common\models\RegisterCourse::find()->where(['status' => 0])->count();
                        //                        $SUMCOUNT  =($register+$paynotify);
                        ?>


                        <li role="presentation" class="dropdown">
                            <a href="javascript:;" class="dropdown-toggle info-number " data-toggle="dropdown"
                               aria-expanded="false">
                                ยังไม่ชำระ
                                <i class="fa fa-money fa-2x"></i>
                                <span class="badge bg-red"><?= $register ?></span>
                            </a>
                            <ul id="menu1" class="dropdown-menu list-unstyled msg_list animated fadeInDown" role="menu">


                                <li>


                                    <a>
                                        <h4 class="text-left"><a href="<?= Url::toRoute('register-course/show') ?>">
                                               <i class="fa fa-exclamation-circle "></i> ข้อความยังไม่ชำระ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <span class=" time badge bg-green "><?= $register; ?></span>
                                        </h4>
                                    </a>

                                </li>

                            </ul>
                        </li>

                        <li role="presentation" class="dropdown">
                            <a href="javascript:;" class="dropdown-toggle info-number " data-toggle="dropdown"
                               aria-expanded="false">
                                แจ้งชำระ
                                <i class="fa fa-envelope-o fa-2x"></i>
                                <span class="badge bg-red"><?= $paynotify ?></span>
                            </a>
                            <ul id="menu1" class="dropdown-menu list-unstyled msg_list animated fadeInDown" role="menu">



                                <li>


                                    <a>
                                        <h4 class="text-left"><a href="<?= Url::toRoute('paynotify/index') ?>">
                                                <i class="fa fa-credit-card"></i> ข้อความแจ้งชำระ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <span class=" time badge bg-green "><?= $paynotify; ?></span>
                                        </h4>
                                    </a>

                                </li>

                            </ul>
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
                            'type' => (!empty($message['type'])) ? $message['type'] : '',
                            'title' => (!empty($message['title'])) ? Html::encode($message['title']) : '',
                            'icon' => (!empty($message['icon'])) ? $message['icon'] : 'fa fa-info',
                            'body' => (!empty($message['message'])) ? Html::encode($message['message']) : '',
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
