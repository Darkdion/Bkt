<?php
use yii\helpers\Html;

$this->title = 'ออกรายงาน';
$this->params['breadcrumbs'][] = $this->title;
?>



<div class="row top_tiles">
    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="tile-stats">
            <div class="icon"><i class="fa fa-money"></i>
            </div>
            <div class="count">รายได้</div>
            <h4 class="text-center">ข้อมูลรายได้</h4>
            <a target="_blank" href="<?= \yii\helpers\Url::toRoute(['report/stu']) ?>">
                <div class="panel-footer">

                    <a  href="<?= \yii\helpers\Url::toRoute(['report/today']) ?>">
                        <p class="text-center">ไปที่ข้อมูลรายได้</p>

                    </a>
                </div>
            </a>
        </div>
    </div>   <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="tile-stats">
            <div class="icon"><i class="fa fa-users"></i>
            </div>
            <div class="count">&nbsp; <?php echo \common\models\Student::find()->count(); ?> คน</div>
            <h4 class="text-center">ข้อมูลนักเรียน</h4>
            <a target="_blank" href="<?= \yii\helpers\Url::toRoute(['report/stu']) ?>">
                <div class="panel-footer">

                    <span class="pull-left">ออกรายงาน</span>
                    <span class="pull-right"><i class="fa fa-print faa-shake animated-hover"></i></span>

                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="tile-stats">
            <div class="icon"><i class="fa fa-users"></i>
            </div>
            <div class="count">&nbsp; <?php echo \common\models\Personnel::find()->count(); ?> คน</div>
            <h4 class="text-center">ข้อมูลพนักงาน</h4>
            <a target="_blank" href="<?= \yii\helpers\Url::toRoute(['report/per']) ?>">
                <div class="panel-footer">

                    <span class="pull-left">ออกรายงาน</span>
                    <span class="pull-right"><i class="fa fa-print faa-shake animated-hover"></i></span>

                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>
