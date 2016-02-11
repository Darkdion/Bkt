<?php

use yii\helpers\Html;
use yii\grid\GridView;
use prawee\assets\PwAsset;
/* @var $this yii\web\View */
/* @var $searchModel common\models\WebImgSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'จัดการภาพสไลค์';
$this->params['breadcrumbs'][] = $this->title;
PwAsset::register($this);
?>
<div class="card card-bordered style-primary">
    <div class="card-head">
        <div class="tools">
            <div class="btn-group">
                <div class="btn-group">
                    <a href="#" class="btn btn-icon-toggle dropdown-toggle" data-toggle="dropdown"><i class="md md-colorize"></i></a>
                    <ul class="dropdown-menu animation-dock pull-right menu-card-styling" role="menu" style="text-align: left;">
                        <li><a href="javascript:void(0);" data-style="style-default-dark"><i class="fa fa-circle fa-fw text-default-dark"></i> Default dark</a></li>
                        <li><a href="javascript:void(0);" data-style="style-default"><i class="fa fa-circle fa-fw text-muted"></i> Default</a></li>
                        <li><a href="javascript:void(0);" data-style="style-default-light"><i class="fa fa-circle fa-fw text-default-light"></i> Default light</a></li>
                        <li><a href="javascript:void(0);" data-style="style-default-bright"><i class="fa fa-circle fa-fw text-default-bright"></i> Default bright</a></li>
                        <li><a href="javascript:void(0);" data-style="style-primary-dark"><i class="fa fa-circle fa-fw text-primary-dark"></i> Primary dark</a></li>
                        <li><a href="javascript:void(0);" data-style="style-primary"><i class="fa fa-circle fa-fw text-primary"></i> Primary</a></li>
                        <li><a href="javascript:void(0);" data-style="style-primary-light"><i class="fa fa-circle fa-fw text-primary-light"></i> Primary light</a></li>
                        <li><a href="javascript:void(0);" data-style="style-primary-bright"><i class="fa fa-circle fa-fw text-primary-bright"></i> Primary bright</a></li>
                        <li><a href="javascript:void(0);" data-style="style-accent-dark"><i class="fa fa-circle fa-fw text-accent-dark"></i> Accent dark</a></li>
                        <li><a href="javascript:void(0);" data-style="style-accent"><i class="fa fa-circle fa-fw text-accent"></i> Accent</a></li>
                        <li><a href="javascript:void(0);" data-style="style-accent-light"><i class="fa fa-circle fa-fw text-accent-light"></i> Accent light</a></li>
                        <li><a href="javascript:void(0);" data-style="style-accent-bright"><i class="fa fa-circle fa-fw text-accent-bright"></i> Accent bright</a></li>
                        <li><a href="javascript:void(0);" data-style="style-danger"><i class="fa fa-circle fa-fw text-danger"></i> Danger</a></li>
                        <li><a href="javascript:void(0);" data-style="style-warning"><i class="fa fa-circle fa-fw text-warning"></i> Warning</a></li>
                        <li><a href="javascript:void(0);" data-style="style-success"><i class="fa fa-circle fa-fw text-success"></i> Success</a></li>
                        <li><a href="javascript:void(0);" data-style="style-info"><i class="fa fa-circle fa-fw text-info"></i> Info</a></li>
                    </ul>
                </div>
                <a class="btn btn-icon-toggle btn-refresh"><i class="md md-refresh"></i></a>
                <a class="btn btn-icon-toggle btn-collapse"><i class="fa fa-angle-down"></i></a>
                <a class="btn btn-icon-toggle btn-close"><i class="md md-close"></i></a>
            </div>
        </div>
        <header> <h1><i class=" faa-shake animated fa fa-image "> </i> <?= Html::encode($this->title) ?></h1></header>
    </div><!--end .card-head -->
    <div class="card-body style-default-bright">
<div class="web-img-index">


    <div class="text-right">

        <?= Html::a('<i class="faa-horizontal animated fa fa-plus"></i> สร้างภาพสไลค์', ['create'],
            ['class' => 'btn btn-success btn-raised btn-sm']) ?>

    </div>
    <div class="table-responsive">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'options'=>['style'=>'width:150px;'],
                'format'=>'raw',
                'attribute'=>'photos',
                'value'=>function($model){
                    return Html::tag('div','',[
                        'style'=>'width:150px;height:95px;
                          border-top: 10px solid rgba(255, 255, 255, .46);
                          background-image:url('.$model->photoViewer.');
                          background-size: cover;
                          background-position:center center;
                          background-repeat:no-repeat;
                          ']);
                }
            ],
            //'id',
            'name',
            //'photos:ntext',
//            'status',
            [
                'label'=>'สถานะ',
                'format'=>'html',
                'value'=>function($model){
                    return $model->status==0?'<i class="glyphicon glyphicon-remove"></i> <span class="text-danger">ปิดการใช้งาน</span>':'<i class="glyphicon glyphicon-ok"></i> <span class="text-success">เปิดการใช้งาน</span>';
                },
                'filter'=>Html::activeDropDownList($searchModel,'status',['0'=>'ปิดการใช้งาน','1'=>'เปิดการใช้งาน']
        ,['class'=>'form-control','prompt'=>'ค้นหาสถานะ']),
            ],
//            'created_at:date',
//             'updated_at:date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


    </div></div>

    </div><!--end .card-body -->
</div><!--end .card -->