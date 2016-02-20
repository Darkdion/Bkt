<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\School */

$this->title = 'แสดงรายละเอียด รหัสที่ '.$model->id;
$this->params['breadcrumbs'][] = ['label' => 'จัดการโรงรียน', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="school-view">

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
            <header> <h1><i class=" faa-shake animated fa fa-desktop "> </i> <?= Html::encode($this->title) ?></h1></header>
        </div><!--end .card-head -->
        <div class="card-body style-default-bright">

            <p>

                <?= Html::a('<i class="faa-shake animated fa fa-plus"></i> สร้างโรงเรียน', ['create'], ['class' => 'btn btn-success btn-sm btn-raised']) ?>

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
            'id',
            'name',
            'created_at',
            'updated_at',
        ],
    ]) ?>
            <div class="">
                <?= Html::a('<i class="faa-pulse  wa animated fa fa-arrow-circle-left"></i> กลับหน้าหลัก', ['index'],
                    ['class' => 'btn btn-warning btn-raised btn-sm']) ?>
            </div>

        </div></div></div>
