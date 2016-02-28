<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\PersonnelSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'จัดการพนักงาน';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="personnel-index">

    <div class="student-view">
        <div class="card card-bordered style-image">
            <div class="card-head">
                <div class="tools">
                    <div class="btn-group">
                        <div class="btn-group">

                        </div>
                        <a class="btn btn-icon-toggle btn-refresh"><i class="md md-refresh"></i></a>

                    </div>
                </div>
                <header> <h1><i class=" faa-pulse animated fa fa-users"> </i> <?= Html::encode($this->title) ?></h1></header>
            </div><!--end .card-head -->
            <div class="card-body style-default-bright">
                <div class="text-right">
                <?= Html::a('<i class="faa-shake animated fa fa-plus"></i> สร้างพนักงาน', ['create'], ['class' => 'btn btn-success btn-sm btn-raised']) ?>

                </div>

                <div class="table table-responsive ">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,

        //'filterModel' => $searchModel,
        'tableOptions'=>[
          'class'=>'table table-hover  '

        ],
        'layout' => "{summary}\n{items}\n{pager}",
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],


            'per_id',
            'userName',
            'fullName',
//            'title',
//            'firstname',
//            'lastname',
            'identification',
            // 'birthday',

             'address',
            'sexName',
            // 'marital',
            // 'province',
            // 'amphur',
            // 'district',
            // 'zip_code',
            // 'salary',
            // 'expire_date',
            // 'phone',
            // 'created_at',
            // 'updated_at',
            // 'user_id',

            ['class' => 'yii\grid\ActionColumn',
              'template' => ' {view}',
                'buttons'=>[
                    'view' => function($url,$model,$key){
                        return Html::a('<i class="btn btn-sm btn-warning fa fa-edit"></i>',$url)  ;
                    }
                ]
            ],
        ],
    ]); ?>
                </div>
                ชื่อ<?=$user ->username ?>

</div>
