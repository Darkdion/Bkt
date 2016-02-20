<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

use prawee\assets\PwAsset;

PwAsset::register($this);

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

<?php

$view=$model->viewtotail+1;
$model->viewtotail=$view;
$model->save();
?>
            <p>

                <?= Html::a('<i class="faa-shake animated fa fa-plus"></i> สร้างข่าวประชาสัมพันธ์', ['create'], ['class' => 'btn btn-success btn-sm btn-raised']) ?>

                <?= Html::a('<i class="faa-horizontal animated fa fa-edit"></i> ปรับปรุง', ['update', 'id' => $model->id], ['class' => 'btn btn-primary btn-sm btn-raised']) ?>
                <?= Html::a('<i class="faa-shake animated fa fa-trash"></i> ลบข้อมูล', ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-danger btn-sm btn-raised',
                    'data' => [
                        'confirm' => 'คุณต้องการลบข้อมูลนี้หรือไหม?',
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
