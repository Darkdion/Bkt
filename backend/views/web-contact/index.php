<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\WebContactSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'จัดการติดต่อ';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="web-contact-index">

    <div class="card card-bordered style-info">
        <div class="card-head">
            <div class="tools">
                <div class="btn-group">
                    <div class="btn-group">

                    </div>
                    <a class="btn btn-icon-toggle btn-refresh"><i class="md md-refresh"></i></a>

                </div>
            </div>
            <header> <h1><i class=" faa-pulse animated fa fa-map-marker fa-2x"> </i> <?= Html::encode($this->title) ?></h1></header>
        </div><!--end .card-head -->
        <div class="card-body style-default-bright">
            <div class="text-right">
                <?= Html::a('<i class="faa-shake animated fa fa-plus"></i> สร้างการติดต่อ', ['create'], ['class' => 'btn btn-success btn-sm btn-raised']) ?>
            </div>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'name',
            'datail',
            'phone',
            'email:email',
            // 'created_at',
            // 'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

        </div></div></div>
