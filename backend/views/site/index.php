<?php

/* @var $this yii\web\View */
use prawee\assets\PwAsset;
PwAsset::register($this);
$this->title = 'จัดระบบแอดมิน';
//$this->registerCssFile('/themes/assets/js/libs/bootstrap/bootstrap.min.js');


?>


<div class="row">
    <br>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="faa-pulse animated  fa fa-users fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div>นักเรียน <span class="hug badge"><?=\common\models\Student::find()->count()?></span> </div>
                        <div>อาจารย์ <span class="badge"><?=\common\models\Teacher::find()->count()?></span> </div>
                        <div>พนักงาน <span class="badge">42</span> </div>
                    </div>
                </div>
            </div>
            <a href="#">
                <div class="panel-footer">
                    <span class="pull-left">จัดการข้อมูลทั่วไป</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-warning  text-warning">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class=" faa-horizontal animated fa fa-book fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div>คอร์สเรียน <span class="badge"><?= \common\models\Course::find()->count()?></span> </div>

                    </div>
                </div>
            </div>
            <a href="#">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-shopping-cart fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">124</div>
                        <div>New Orders!</div>
                    </div>
                </div>
            </div>
            <a href="#">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-success">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-support fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">13</div>
                        <div>Support Tickets!</div>
                    </div>
                </div>
            </div>
            <a href="#">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>


</div>
<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-gra ">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="faa-tada animated fa fa-graduation-cap fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div>โรงเรียน <span class="badge"><?= \common\models\School::find()->count()?></span> </div>

                    </div>
                </div>
            </div>
            <a href="#">
                <div class="panel-footer">
                    <span class="pull-left">จัดการข้อมูลโรงเรียน</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <h1>จัดการระบบ</h1>
        <div class="row">

        </div>
    </div></div>



<style>
    .panel-gra {
        border-color: #9A12B3;
    }
    .panel-gra > .panel-heading {
        color: #ffffff;
        background-color: #9A12B3;
        border-color: #BF55EC;
    }
    .panel-gra > .panel-heading + .panel-collapse > .panel-body {
        border-top-color: #BE90D4;
    }
    .panel-gra > .panel-heading .badge {
        color: #9A12B3;
        background-color: #ffffff;
    }
    .panel-gra > .panel-footer + .panel-collapse > .panel-body {
        border-bottom-color: #BE90D4;
    }
</style>
