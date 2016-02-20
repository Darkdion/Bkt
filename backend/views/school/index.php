<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\SchoolSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'จัดการข้อมูลโรงเรียน';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="school-index">
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
            <header> <h1><i class=" faa-wrench animated fa fa-graduation-cap fa-2x"> </i> <?= Html::encode($this->title) ?></h1></header>
        </div><!--end .card-head -->
        <div class="card-body style-default-bright">


            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

            <?php \yii\bootstrap\Modal::begin(['id'=>'main-modal']);
            echo '<div id="main-content-modal"></div>';
            \yii\bootstrap\Modal::end();
            ?>
            <div class="text-right">
                <p>
                    <?= Html::a('<i class="faa-spin animated fa fa-star-half-o"></i> สร้างโรงเรียน', ['create'], ['class' => 'btn btn-success btn-sm btn-raised']) ?>
                </p>
-
            </div>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
       // 'filterModel' => $searchModel,
        //'layout'=>'{errors}{items}{pager}',


        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'name',
           // 'created_at',
            //'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

        </div></div></div>
