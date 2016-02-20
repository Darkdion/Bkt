<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Course */

$this->title = 'แสดงรายละเอียด รหัสที่ '.$model->cod_id;
$this->params['breadcrumbs'][] = ['label' => 'จัดการคอร์สเรียน', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="course-view">




        <div class="card">
            <div class="card-head"><header> <h1><i class=" faa-shake animated fa fa-book "> </i> <?= Html::encode($this->title) ?></h1></header></div>
            <div class="card-body">
                <p>

                    <?= Html::a('<i class="faa-shake animated fa fa-plus"></i> สร้างคอร์สเรียน', ['create'], ['class' => 'btn btn-success btn-sm btn-raised']) ?>

                    <?= Html::a('<i class="faa-horizontal animated fa fa-edit"></i> ปรับปรุง', ['update', 'id' => $model->id], ['class' => 'btn btn-primary btn-sm btn-raised']) ?>
                    <?= Html::a('<i class="faa-shake animated fa fa-trash"></i> ลบข้อมูล', ['delete', 'id' => $model->id], [
                        'class' => 'btn btn-danger btn-sm btn-raised',
                        'data' => [
                            'confirm' => 'Are you sure you want to delete this item?',
                            'method' => 'post',
                        ],
                    ]) ?>
                </p>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'cod_id',
            'name',
            'detail',
            'price',
            'date_s',
            'date_c',
            'photos:ntext',
            [
                'format'=>'raw',
                'attribute'=>'photos',
                'value'=>Html::img($model->photoViewer,['class'=>'img-thumbnail','style'=>'width:200px;'])
            ],
            //'typecourse_id',
           // 'teacher_id',
            [
                'attribute'=>'teacher_id',
                'value'=>$model->teacher->getFullName()
            ],
            [
                'attribute' => 'typecourse_id',
                'value' => $model->typecourse->name
            ],

        ],
    ]) ?>

                <div class="">
                    <?= Html::a('<i class="faa-pulse  wa animated fa fa-arrow-circle-left"></i> กลับหน้าหลัก', ['index'],
                        ['class' => 'btn btn-warning btn-raised btn-sm']) ?>
                </div>
</div>
        </div>
</div>
