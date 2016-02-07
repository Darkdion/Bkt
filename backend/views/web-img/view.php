<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\WebImg */

$this->title ='แสดงรายละเอียดรูปภาพรหัสที่ :'. $model->id;
$this->params['breadcrumbs'][] = ['label' => 'จัดการภาพสไลค์', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="web-img-view">
    <div class="card">
        <div class="card-head"><header> <h1><i class=" faa-shake animated fa fa-image "> </i> <?= Html::encode($this->title) ?></h1></header></div>
        <div class="card-body">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
           // 'id',
            'name',
//            'photos:ntext',
            [
                'format'=>'raw',
                'attribute'=>'photo',
                'value'=>Html::img($model->photoViewer,['class'=>'img-thumbnail text-center','style'=>'width:500px;'])
            ],

            [
              'attribute'=>'status',
                'value'=>$model->status=='0'? 'ปิดใช้งาน':'เปิดใช้งาน'
            ],
            'created_at',
            'updated_at',
        ],
    ]) ?>
<div class="">
    <?= Html::a('<i class="faa-pulse  wa animated fa fa-arrow-circle-left"></i> กลับหน้าหลัก', ['index'],
        ['class' => 'btn btn-warning btn-raised btn-sm']) ?>
</div>
</div>
    </div>
</div>

