<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\StudentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'จัดการข้อมูลสมาชิก';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="student-index">
    <div class="card  ">
        <div class="card-head">
            <div class="tools">
                <div class="btn-group">
                    <div class="btn-group">

                    </div>
                    <a class="btn btn-icon-toggle btn-refresh"><i class="md md-refresh"></i></a>
                    <a class="btn btn-icon-toggle btn-collapse"><i class="fa fa-angle-down"></i></a>
                    <a class="btn btn-icon-toggle btn-close "><i class="md md-close"></i></a>
                </div>
            </div>
            <header> <h1><i class=" faa-horizontal animated-hover fa fa-users fa-2x"> </i> <?= Html::encode($this->title) ?></h1></header>
        </div><!--end .card-head -->
        <div class="card-body style-default-bright">
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
            'identification',
             'education',
            // 'birthday',
            // 'sex',
            // 'address',
             'schoolName',
            // 'province',
            // 'amphur',
            // 'district',
            // 'zip_code',
            // 'phone',
            // 'created_at',
            // 'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
        </div>
