<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Typecourse */

$this->title ='แสดงรายละเอียดรหัสที่ :'. $model->id;
$this->params['breadcrumbs'][] = ['label' => 'จัดการประเภทคอร์ส', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="typecourse-view">

    <div class="card card-bordered style-accent-dark ">
        <div class="card-head">
            <div class="tools">
                <div class="btn-group">
                    <div class="btn-group">

                    </div>
                    <a class="btn btn-icon-toggle btn-refresh"><i class="md md-refresh"></i></a>

                </div>
            </div>
            <header> <h1><i class=" faa-flash animated fa fa-eye fa-2x"> </i> <?= Html::encode($this->title) ?></h1></header>
        </div><!--end .card-head -->
        <div class="card-body style-default-bright">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
           // 'id',
            'name',
            'created_at',
            'updated_at',
        ],
    ]) ?>
            <div class="text-center">
                <button type="button" class="btn btn-default btn-raised" data-dismiss="modal"> <i class="faa-pulse  wa animated fa fa-ban"></i> ปิดหน้านี้</button>


            </div>

        </div></div></div>
