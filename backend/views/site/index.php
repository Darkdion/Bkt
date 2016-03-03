<?php

/* @var $this yii\web\View */
use prawee\assets\PwAsset;

PwAsset::register($this);
$this->title = 'จัดระบบแอดมิน';
//$this->registerCssFile('/themes/assets/js/libs/bootstrap/bootstrap.min.js');


?>


<div class="col-sm-12">
    <div class="x_panel">
        <div class="x_title">
            <h2><i class="fa fa-cog  faa-wrench animated"></i> จัดการข้อมูล
                <small>Activity shares</small>
            </h2>
            <ul class="nav navbar-right panel_toolbox">

            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">

            <p>จัดการข้อมูล</p>



        </div>
    </div>
</div>


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
