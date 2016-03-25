<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\StudentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'จัดการข้อมูลสมาชิก';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="x_panel">
    <div class="x_title">
        <h2> <i class=" faa-pulse animated fa fa-users"> </i> <?= Html::encode($this->title) ?></h2>
        <ul class="nav navbar-right panel_toolbox">

        </ul>
        <div class="clearfix"></div>
    </div>
    <div class="x_content">
            <div class="text-right">
                <?= Html::a('<i class="faa-bounce animated-hover  fa fa-plus"></i> สร้างสมาชิก', ['create'], ['class' => 'btn btn-success btn-sm btn-raised']) ?>
            </div>


            <?= GridView::widget([

        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'fullName',
//            'title',
//            'firstname',
//            'lastname',
            //'identification',
             'education',
            // 'birthday',
            // 'sex',
            'username',
             'address',
             'schoolName',
            'sexName',
            // 'province',
            // 'amphur',
            // 'district',
            // 'zip_code',
            // 'phone',
            // 'created_at',
            // 'updated_at',

            ['class' => 'yii\grid\ActionColumn',
                'template' => ' {view}',
                'buttons'=>[
                    'view' => function($url,$model,$key){
                        return Html::a('<i class="btn btn-sm btn-info fa fa-edit">ดูข้อมูล</i>',$url)  ;
                    }
                ]
            ],
        ],
    ]); ?>

</div>
        </div>
