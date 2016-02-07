<?php

use yii\helpers\Html;
use yii\grid\GridView;
use prawee\assets\PwAsset;
/* @var $this yii\web\View */
/* @var $searchModel common\models\WebCourseSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
PwAsset::register($this);
$this->title = 'จัดการรายคอร์สเรียนและความรู้ทั่วไป';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="web-course-index">

    <div class="card card-bordered style-success ">
        <div class="card-head">
            <div class="tools">
                <div class="btn-group">
                    <div class="btn-group">

                    </div>
                    <a class="btn btn-icon-toggle btn-refresh"><i class="md md-refresh"></i></a>

                </div>
            </div>
            <header> <h1><i class=" faa-pulse animated fa fa-book fa-2x"> </i> <?= Html::encode($this->title) ?></h1></header>
        </div><!--end .card-head -->
        <div class="card-body style-default-bright">
            <div class="text-right">
                <?= Html::a('<i class="faa-shake animated fa fa-plus"></i> สร้างคอร์สเรียน', ['create'], ['class' => 'btn btn-success btn-sm btn-raised']) ?>
            </div>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                // 'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    //  'id',
                    'name',
                    //'detail',



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
                    // 'viewtotail',
                    // 'status',
                    [
                        'label'=>'สถานะ',
                        'format'=>'html',
                        'value'=>function($model){
                            return $model->status==0?'<i class="glyphicon glyphicon-remove"></i> <span class="text-danger">ปิดการใช้งาน</span>':'<i class="glyphicon glyphicon-ok"></i> <span class="text-success">เปิดการใช้งาน</span>';
                        }
                    ],
                    // 'created_at',
                    // 'update_at',
                    // 'typecourse_id',

                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>

        </div>
    </div>
</div>

