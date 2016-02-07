<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\WebNews */

$this->title ='แสดงรายละเอียดข่าว รหัสที่ :'. $model->id;
$this->params['breadcrumbs'][] = ['label' => 'จัดการข่าว', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="web-news-view">

    <div class="card">
        <div class="card-head"><header> <h1><i class=" faa-float animated fa fa-desktop "> </i> <?= Html::encode($this->title) ?></h1></header></div>
        <div class="card-body">


        <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'detail',
            'viewtotail',
//            'status',
            [
                'attribute' => 'status',
                'format' => 'html',
                'value' => $model->status == '0' ? 'ปิดการใช้งาน' : 'เปิดการใช้งาน'
            ],
            'created_at:datetime',
            'updated_at:datetime',
            'newscategoriesName',

        ],
    ]) ?>
            <div class="">
                <?= Html::a('<i class="faa-pulse  wa animated fa fa-arrow-circle-left"></i> กลับหน้าหลัก', ['index'],
                    ['class' => 'btn btn-warning btn-raised btn-sm']) ?>
            </div>

        </div></div></div>
