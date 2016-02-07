<?php

use yii\helpers\Html;
use yii\grid\GridView;
use prawee\assets\PwAsset;
/* @var $this yii\web\View */
/* @var $searchModel common\models\WebNewsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
PwAsset::register($this);
$this->title = 'จัดการข่าวประชาสัมพันธ์';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="card  ">
    <div class="card-head">
        <div class="tools">
            <div class="btn-group">
                <div class="btn-group">

                </div>
                <a class="btn btn-icon-toggle btn-refresh"><i class="md md-refresh"></i></a>
                <a class="btn btn-icon-toggle btn-collapse"><i class="fa fa-angle-down"></i></a>
                <a class="btn btn-icon-toggle btn-close"><i class="md md-close"></i></a>
            </div>
        </div>
        <header> <h1><i class=" faa-wrench animated fa fa-newspaper-o fa-2x"> </i> <?= Html::encode($this->title) ?></h1></header>
    </div><!--end .card-head -->
    <div class="card-body style-default-bright">


    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="text-right">

        <?= Html::a('<i class="faa-shake animated fa fa-plus"></i> สร้างข่าว', ['create'],
            ['class' => 'btn btn-success btn-raised btn-sm']) ?>
    </div>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
       // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

          //  'id',
            'name',
          //  'detail',
           // 'viewtotail',
//            'status',

            [
                'label'=>'สถานะ',
                'format'=>'html',
                'value'=>function($model){
                    return $model->status==0?'<i class="glyphicon glyphicon-remove"></i> <span class="text-danger">ปิดการใช้งาน</span>':'<i class="glyphicon glyphicon-ok"></i> <span class="text-success">เปิดการใช้งาน</span>';
                }
            ],
            // 'created_at',
            // 'updated_at',

            [
                'attribute'=>'newscategories_id',
                'value'=>'newscategories.name'
            ],
//            'newscategories_id:name',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>

</div>
</div>