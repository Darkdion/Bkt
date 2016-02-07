<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\WebCourse */

$this->title  ='แสดงรายละเอียดรหัสที่'. $model->id;
$this->params['breadcrumbs'][] = ['label' => 'จัดการคอร์สเรียนและความรู้ทั่วไป', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="web-course-view">

    <div class="card card-bordered style-success ">
        <div class="card-head">
            <div class="tools">
                <div class="btn-group">
                    <div class="btn-group">

                    </div>
                    <a class="btn btn-icon-toggle btn-refresh"><i class="md md-refresh"></i></a>

                </div>
            </div>
            <header> <h1><i class=" faa-pulse animated fa fa-desktop fa-2x"> </i> <?= Html::encode($this->title) ?></h1></header>
        </div><!--end .card-head -->
        <div class="card-body style-default-bright">

            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    //'id',
                    [
                        'format'=>'raw',
                        'attribute'=>'photo',
                        'value'=>Html::img($model->photoViewer,['class'=>'img-thumbnail text-center','style'=>'width:500px;'])
                    ],
                    'name',
                    'detail',
                    [
                      'attribute'=>'status',
                        'value'=>$model->status =='0' ?'ปิดการใช้งาน' : 'เปิดการใช้งาน'
                    ],
                    'viewtotail',
                    //'status',
                    'created_at',
                    'updated_at',
                    'typecourse_id',
                ],
            ]) ?>
            <div class="">
                <?= Html::a('<i class="faa-pulse  wa animated fa fa-arrow-circle-left"></i> กลับหน้าหลัก', ['index'],
                    ['class' => 'btn btn-warning btn-raised btn-sm']) ?>
            </div>

        </div></div></div>
