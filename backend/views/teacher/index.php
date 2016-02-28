<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\TeacherSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'จัดการข้อมูลอาจารย์';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="teacher-index">



            <div class="x_panel">
                <div class="x_title">
                    <h2> <i class=" faa-horizontal animated fa fa-user-secret fa-2x"> </i> <?= Html::encode($this->title) ?></h2>
                    <ul class="nav navbar-right panel_toolbox">

                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
            <div class="text-right">
                <?= Html::a('<i class="faa-bounce animated fa fa-user-plus"></i> สร้างอาจารย์', ['create'], ['class' => 'btn btn-success btn-sm btn-raised']) ?>
            </div>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],


            'fullName',
//            'id',
//            'title',
//            'name',
//            'surname',
        'sexName',
            'identification',
             'birthday:date',
            // 'sex',
            // 'age',
            // 'province',
            // 'amphur',
            // 'district',
            // 'address',
            // 'experience',
            // 'phone',
            // 'created_at',
            // 'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

        </div></div>
