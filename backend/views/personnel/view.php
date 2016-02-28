<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Personnel */

$this->title ='รหัสที่'. $model->per_id;
$this->params['breadcrumbs'][] = ['label' => 'จัดการพนักงาน', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="personnel-view">

    <div class="student-view">
        <div class="card card-bordered style-image">
            <div class="card-head">
                <div class="tools">
                    <div class="btn-group">
                        <div class="btn-group">

                        </div>
                        <a class="btn btn-icon-toggle btn-refresh"><i class="md md-refresh"></i></a>

                    </div>
                </div>
                <header> <h1><i class=" faa-pulse animated fa fa-users"> </i> <?= Html::encode($this->title) ?></h1></header>
            </div><!--end .card-head -->
            <div class="card-body style-default-bright">
                <p>

                    <?= Html::a('<i class="faa-shake animated fa fa-plus"></i> สร้างสมาชิก', ['create'], ['class' => 'btn btn-success btn-sm btn-raised']) ?>

                    <?= Html::a('<i class="faa-horizontal animated fa fa-edit"></i> ปรับปรุง', ['update', 'id' => $model->per_id], ['class' => 'btn btn-primary btn-sm btn-raised']) ?>
                    <?= Html::a('<i class="faa-pulse animated fa fa-trash"></i> ลบข้อมูล', ['delete', 'id' => $model->per_id,'user_id'=>$model->user_id], [
                        'class' => 'btn btn-danger btn-sm btn-raised',
                        'data' => [
                            'confirm' => 'คุณต้องการลบข้อมูลใช่หรือไม่?',
                            'method' => 'post',
                        ],
                    ]) ?>
                </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'per_id',
            'fullName',
//            'title',
//            'firstname',
//            'lastname',
            'identification',
            'birthday',
            'sexName',
            'maritalName',
            'address',
            [
                'attribute'=>'district',
                'value'=>@\common\models\District::findOne(['DISTRICT_ID'=>$model->district])->DISTRICT_NAME
            ],
            [
                'attribute'=>'amphur',
                'value'=>@\common\models\Amphur::findOne(['AMPHUR_ID'=>$model->amphur])->AMPHUR_NAME
            ],
            [
                'attribute'=>'province',
                'value'=>@\common\models\Province::findOne(['PROVINCE_ID'=>$model->province])->PROVINCE_NAME
            ],

//            'province',
//            'amphur',
//            'district',
            'zip_code',
            'salary',
            'expire_date',
            'phone',
            'userName'
//            'created_at',
//            'updated_at',
//            'user_id',
        ],
    ]) ?>
                <?= Html::a('<i class="faa-pulse  wa animated fa fa-arrow-circle-left"></i> กลับหน้าหลัก', ['index'],
                    ['class' => 'btn btn-warning btn-raised btn-sm']) ?>
            </div>
        </div>
