<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\CourseSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

use prawee\assets\PwAsset;
PwAsset::register($this);
$this->title = 'จัดการคอร์สเรียน';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="course-index">

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
            <header> <h1><i class=" faa-shake animated fa fa-book fa-2x"> </i> <?= Html::encode($this->title) ?></h1></header>
        </div><!--end .card-head -->
        <div class="card-body style-default-bright">
            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

            <div class="text-right">
                <?= Html::a('<i class="faa-float animated fa fa-plus"></i> สร้างคอร์สเรียนู่', ['create'], ['class' => 'btn btn-success btn-sm btn-raised']) ?>
            </div>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

          // 'id',
            'cod_id',
            'name',
            //'detail',
            'price',
            // 'date_s',
            // 'date_c',
            // 'photos:ntext',
            // 'typecourse_id',
            // 'teacher_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
    </div>    </div>
