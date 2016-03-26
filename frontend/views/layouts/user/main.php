<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\UsersAsset;
use common\widgets\Alert;
use common\models\RegisterCourse;
use common\models\Paynotify;

UsersAsset::register($this);
if (!empty(Yii::$app->user->can('Admin'))) {

} else {


    $student = \common\models\Student::find()
        ->where(['user_id' => Yii::$app->user->id])
        ->all();
    foreach ($student as $model):

    endforeach;

    $RegisterCourse = RegisterCourse::find()
        ->where(['status' => 0, 'student_id' => $model->id])
        ->count();

    $Paynotify = Paynotify::find()
        ->where(['status' => 2, 'student_id' => $model->id])
        ->count();


    $Sumcount = $RegisterCourse + $Paynotify; //นับข้อความ
}
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
<body>
<?php $this->beginBody() ?>


<div class="wrap">

    <div id="wrapper">

        <!-- begin TOP NAVIGATION -->
        <nav class="navbar-top" role="navigation">

            <!-- begin BRAND HEADING -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle pull-right" data-toggle="collapse"
                        data-target=".sidebar-collapse">
                    <i class="fa fa-bars"></i> เมนู
                </button>
                <div class="navbar-brand">
                    <a href="index.php?r=site/index" class="btn btn-green text-center">
                        ไปเว็บไซต์
                    </a>
                </div>
            </div>
            <!-- end BRAND HEADING -->

            <div class="nav-top">

                <!-- begin LEFT SIDE WIDGETS -->
                <ul class="nav navbar-left">
                    <li class="tooltip-sidebar-toggle">
                        <a href="#" id="sidebar-toggle" data-toggle="tooltip" data-placement="right"
                           title="Sidebar Toggle">
                            <i class="fa fa-bars"></i>
                        </a>
                    </li>
                    <!-- You may add more widgets here using <li> -->
                </ul>
                <!-- end LEFT SIDE WIDGETS -->

                <!-- begin MESSAGES/ALERTS/TASKS/USER ACTIONS DROPDOWNS -->
                <ul class="nav navbar-right">

                    <!-- begin MESSAGES DROPDOWN -->

                    <!-- /.dropdown -->
                    <!-- end MESSAGES DROPDOWN -->

                    <!-- begin ALERTS DROPDOWN -->
                    <?php if (!empty(Yii::$app->user->can('Admin'))): ?>

                    <?php else: ?>


                        <li class="dropdown">
                            <a href="#" class="alerts-link dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-envelope"></i> ข้อความแจ้งเตือน
                                <span class="number"><?= $Sumcount ?></span><i class="fa fa-caret-down"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-scroll dropdown-alerts">

                                <!-- Alerts Dropdown Heading -->
                                <li class="dropdown-header">
                                    <i class="fa fa-bell "></i> <?= $Sumcount ?> ข้อความใหม่
                                </li>

                                <!-- Alerts Dropdown Body - This is contained within a SlimScroll fixed height box. You can change the height using the SlimScroll jQuery features. -->
                                <li id="alertScroll">
                                    <ul class="list-unstyled">
                                        <li>
                                            <a href="<?= \yii\helpers\Url::to(['register-course/registerdetail']) ?>">
                                                <div class="alert-icon green pull-left">
                                                    <i class="fa fa-money"></i>
                                                </div>
                                                ยังไม่ชำระ
                                            <span class="small pull-right">
                                               <span class="label label-danger"><?= $RegisterCourse ?></span>
                                            </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?= \yii\helpers\Url::to(['register-course/registerdetail']) ?>">
                                                <div class="alert-icon red pull-left">
                                                    <i class="fa fa-ban"></i>
                                                </div>
                                                แจ้งชำระไม่ถูกต้อง
                                            <span class="small pull-right">
                                              <span class="label label-danger">
                                                  <?php
                                                  echo $Paynotify;
                                                  ?>

                                              </span>
                                            </span>
                                            </a>
                                        </li>


                                    </ul>
                                </li>

                                <!-- Alerts Dropdown Footer -->


                            </ul>
                            <!-- /.dropdown-menu -->
                        </li>

                        <!-- /.dropdown -->
                        <!-- end ALERTS DROPDOWN -->

                        <!-- begin TASKS DROPDOWN -->

                        <!-- /.dropdown -->
                        <!-- end TASKS DROPDOWN -->

                        <!-- begin USER ACTIONS DROPDOWN -->
                        <li class="dropdown">

                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-user"> </i> <i class="fa fa-caret-down"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li>
                                    <a href="<?= \yii\helpers\Url::to(['profile/index']) ?>">
                                        <i class="fa fa-user"></i> โปรไฟล์
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= \yii\helpers\Url::to(['profile/student']) ?>">
                                        <i class="fa fa-cogs"></i> แก้ไขข้อมูลส่วนตัว

                                    </a>
                                </li>
                                <li>
                                    <a href="<?= \yii\helpers\Url::to(['profile/update']) ?>">
                                        <i class="fa fa-envelope"></i>แก้ไขข้อมูลผู้ใช้งาน

                                    </a>
                                </li>


                                <li class="divider"></li>

                                <li>
                                    <a style="color: inherit" class="logout_open" href="#logout"
                                       data-toggle="tooltip" data-placement="top"
                                       title="Logout"><i class="fa fa-sign-out"></i> ออกจากระบบ</a>

                                </li>
                            </ul>
                            <!-- /.dropdown-menu -->
                        </li>
                        <!-- /.dropdown -->
                        <!-- end USER ACTIONS DROPDOWN -->
                    <?php endif; ?>
                </ul>
                <!-- /.nav -->
                <!-- end MESSAGES/ALERTS/TASKS/USER ACTIONS DROPDOWNS -->

            </div>
            <!-- /.nav-top -->
        </nav>
        <!-- /.navbar-top -->
        <!-- end TOP NAVIGATION -->

        <!-- begin SIDE NAVIGATION -->
        <nav class="navbar-side" role="navigation">
            <div class="navbar-collapse sidebar-collapse collapse">
                <ul id="side" class="nav navbar-nav side-nav">
                    <!-- begin SIDE NAV USER PANEL -->
                    <li class="side-user hidden-xs">
                        <!--                        <img class="img-circle" src="img/profile-pic.jpg" alt="">-->
                        <h4 class="welcome">

                            ผู้ใช้งาน <?php echo Yii::$app->user->identity->username ?> </i>
                        </h4>
                        <p class="name tooltip-sidebar-logout">
                            <?php if (!empty(Yii::$app->user->can('Admin'))): ?>
                            <?php else: ?>

                                <a href="index.php?r=profile/index" class="btn btn-success"><i class="fa fa-user"> </i></a>
                            <?php endif; ?>
                            <a style="color: inherit" class="logout_open btn btn-danger" href="#logout"
                               data-toggle="tooltip" data-placement="top"
                               title="Logout"><i class="glyphicon glyphicon-off"></i></a>

                        </p>

                        <div class="clearfix"></div>
                    </li>
                    <!-- end SIDE NAV USER PANEL -->
                    <!-- begin SIDE NAV SEARCH -->

                    <!-- end SIDE NAV SEARCH -->
                    <!-- begin DASHBOARD LINK -->
                    <li>
                        <a href="<?= \yii\helpers\Url::to(['site/users']) ?>">
                            <i class="fa fa-dashboard"></i> หน้าหลัก
                        </a>
                    </li>

                    <!-- end DASHBOARD LINK -->
                    <!-- begin CHARTS DROPDOWN -->
                    <li class="panel">
                        <a href="<?= \yii\helpers\Url::to(['register-course/index']) ?>" data-parent="#side"
                           data-toggle="collapse" class="accordion-toggle"
                           data-target="#charts">
                            <i class="fa fa-shopping-cart"></i> ลงทะเบียนเรียน
                        </a>
                        <ul class="collapse nav" id="charts">

                        </ul>
                    </li>

                    <li>
                        <a href="<?= \yii\helpers\Url::to(['register-course/registerdetail']) ?>">
                            <i class="fa fa-book"></i> รายการลงทะเบียน
                        </a>
                    </li>
                    <li>
                        <a href="<?= \yii\helpers\Url::to(['history/index']) ?>">
                            <i class="fa fa-server"></i> ประวัติการลงทะเบียน
                        </a>
                    </li>
                    <li>
                        <a href="<?= \yii\helpers\Url::to(['paynotify/index']) ?>">
                            <i class="fa fa-exclamation-circle"></i> ประวัติแจ้งชำระ
                        </a>
                    </li>

                    <!-- end CHARTS DROPDOWN -->
                    <!-- begin FORMS DROPDOWN -->


                </ul>
                <!-- /.side-nav -->
            </div>
            <!-- /.navbar-collapse -->
        </nav>
        <!-- /.navbar-side -->
        <!-- end SIDE NAVIGATION -->

        <!-- begin MAIN PAGE CONTENT -->
        <div id="page-wrapper">

            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>

            <?= Alert::widget() ?>
            <br>
            <div class="row">
                <div class="col-lg-2 col-sm-6">
                    <div class="circle-tile">
                        <a href="<?= \yii\helpers\Url::to(['site/users']) ?>">
                            <div class="circle-tile-heading purple">
                                <i class="fa fa-dashboard fa-fw fa-3x"></i>
                            </div>
                        </a>
                        <div class="circle-tile-content purple">
                            <div class="circle-tile-description text-faded">
                                หน้าหลัก
                            </div>

                            <a href="#" class="circle-tile-footer"></a>
                        </div>
                    </div>
                </div>
                <?php if (!empty(Yii::$app->user->can('Admin'))): ?>
                <?php else: ?>

                    <div class="col-lg-2 col-sm-6">
                        <div class="circle-tile">
                            <a href="<?= yii\helpers\Url::to(['profile/index']) ?>">
                                <div class="circle-tile-heading dark-blue">
                                    <i class="fa fa-user-md fa-fw fa-3x"></i>
                                </div>
                            </a>
                            <div class="circle-tile-content dark-blue">
                                <div class="circle-tile-description text-faded">
                                    <strong>โปรไฟล์</strong>
                                </div>

                                <a href="#" class="circle-tile-footer"></a>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                <div class="col-lg-2 col-sm-6">
                    <div class="circle-tile">
                        <a href="<?= yii\helpers\Url::to(['register-course/index']) ?>">
                            <div class="circle-tile-heading green">
                                <i class="fa  fa-shopping-basket fa-fw fa-3x"></i>
                            </div>
                        </a>
                        <div class="circle-tile-content green">
                            <div class="circle-tile-description text-faded">
                                <strong>ลงทะเบียน</strong>
                            </div>

                            <a href="#" class="circle-tile-footer"></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-6">
                    <div class="circle-tile">
                        <a href="<?= yii\helpers\Url::to(['register-course/registerdetail']) ?>">
                            <div class="circle-tile-heading orange">
                                <i class="fa fa-book fa-fw fa-3x"></i>
                            </div>
                        </a>
                        <div class="circle-tile-content orange">
                            <div class="circle-tile-description text-faded">
                                <strong>รายการลงทะเบียนเรียน</strong>
                            </div>

                            <a href="#" class="circle-tile-footer"></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-6">
                    <div class="circle-tile">
                        <a href="<?= \yii\helpers\Url::to(['history/index']) ?>">
                            <div class="circle-tile-heading blue">

                                <i class="fa fa-tasks fa-fw fa-3x">

                                </i>
                            </div>
                        </a>
                        <div class="circle-tile-content blue">
                            <div class="circle-tile-description text-faded">
                                <strong>ประวัติการลงทะเบียน</strong>
                            </div>

                            <a href="#" class="circle-tile-footer"></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-6">

                    <div class="circle-tile">
                        <a href="<?= \yii\helpers\Url::to(['paynotify/index']) ?>">
                            <div class="circle-tile-heading red">
                                <i class="fa fa-exclamation-circle fa-fw fa-3x"></i>
                            </div>
                        </a>
                        <div class="circle-tile-content red">
                            <div class="circle-tile-description text-faded">
                                ประวัติแจ้งชำระ
                            </div>

                            <a href="#" class="circle-tile-footer"></a>
                        </div>
                    </div>
                </div>

            </div>
            <?= $content ?>


            <!-- /.page-content -->

        </div>
        <!-- /#page-wrapper -->
        <!-- end MAIN PAGE CONTENT -->

    </div>
    <!-- /#wrapper -->

    <!-- GLOBAL SCRIPTS -->

    <!-- Logout Notification Box -->
    <div id="logout">
        <div class="logout-message">
            <br>
            <h3>
                <i class="fa fa-sign-out text-green"></i>
                <?php $user=Yii::$app->user->identity->id;
                ?>
                คุณต้องการออกจากระบบใช่หรือไม่ ?
                <?php if(!empty(Yii::$app->user->can('Admin'))):?>
                <?php else:?>
                    <?php $STU =\common\models\Student::find()->where(['user_id'=>$user])->all();?>
               <?php foreach($STU as $student) :   ///loopหาชื่อ


                    ?>
                        คุณ &nbsp; <?= $student->fullName; ?>&nbsp;ต้องการออกจากระบบใช่หรือไม่ ?
                    <?php endforeach;?>
                <?php endif;?>
            </h3>

            <ul class="list-inline">
                <li>
                    <a href="<?= \yii\helpers\Url::to(['/site/logout']) ?>" data-method="post" class="btn btn-green">
                        <strong>ยืนยัน</strong>
                    </a>
                </li>
                <li>
                    <button class="logout_close btn btn-danger">ยกเลิก</button>
                </li>
            </ul>
        </div>
    </div>


</div>


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
