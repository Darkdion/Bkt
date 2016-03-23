<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

use branchonline\lightbox\Lightbox;

/* @var $this yii\web\View */
/* @var $model common\models\Course */

$this->title = 'แสดงรายละเอียดรหัสที่ :' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'จัดการคอร์สเรียน', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;


?>
<div class="container">


    <div class="panel">
        <div class="panel-body">
            <h1 class="text-center"><i class="fa fa-book"></i> วิชาเรียน : <?= $model->name ?>  </h1>

            <div class="clearfix"></div>

        <div class="x_content">
            <h3><i class="fa fa-users"></i> อาจารย์ผู้สอน : <?= $model->fullName ?>  </h3>
            <h3><i class="fa fa-money"></i> ราคา : <?= number_format($model->price) ?> บาท </h3>
            <h3><i class="fa fa-share"></i> รายละเอียด : <?= $model->detail ?>  </h3>
            <a href="<?= Yii::getAlias('@back/photos/course/') . $model->photos ?>" data-title="<?= $model->name ?> " data-lightbox="Vacation">
                <img src="<?= Yii::getAlias('@back/photos/course/') . $model->photos ?>" class="img-thumbnail">
            </a>

            <?php
            echo Lightbox::widget([
                'files' => [ [      ],
                ]
            ]);
            ?>



            <div class="text-center">

                <a href="<?= \yii\helpers\Url::toRoute('site/couse') ?>" class="btn topBtnOpenAccount  ">
                    <i class="glyphicon glyphicon-triangle-left"></i> ย้อนกลับ</a>
            </div>
        </div>

        </div>

