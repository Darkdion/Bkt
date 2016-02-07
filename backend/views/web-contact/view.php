<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\WebContact */

$this->title ='แสดงรายละเอียดการติดต่อรหัสที่:'. $model->id;
$this->params['breadcrumbs'][] = ['label' => 'จัดการติดต่อ', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="web-contact-update">
    <div class="card card-bordered style-warning">
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


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
           // 'id',
            'name',
            'detail',
            'phone',
            'email:email',
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
