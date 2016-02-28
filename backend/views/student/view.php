<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Student */

$this->title = $model->getFullName();
$this->params['breadcrumbs'][] = ['label' => 'จัดการข้อมูลสมาชิก', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => ['view']];

use yii\helpers\Url;
?>
<div class="student-view">
    <div class="x_panel">
        <div class="x_title">
            <h2> <i class=" faa-pulse animated fa fa-users"> </i> <?= Html::encode($this->title) ?></h2>
            <ul class="nav navbar-right panel_toolbox">

            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <p>

                <?= Html::a('<i class="faa-shake animated fa fa-plus"></i> สร้างสมาชิก', ['create'], ['class' => 'btn btn-success btn-sm btn-raised']) ?>

                <?= Html::a('<i class="faa-horizontal animated fa fa-edit"></i> ปรับปรุง', ['update', 'id' => $model->id], ['class' => 'btn btn-primary btn-sm btn-raised']) ?>
                <?= Html::a('<i class="faa-pulse animated fa fa-trash"></i> ลบข้อมูล', ['delete', 'id' => $model->id,'user_id'=>$model->user_id], [
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
            //'id',
            //'title',
            //'firstname',
            //'lastname',
            'fullName',
            'identification',
            'education',
            'birthday:date',
           // 'sex',
            'sexName',
            'school_id',
            'address',

            //'province.PROVINCE_NAME',
            //'amphur.AMPHUR_NAME',
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

            //'district',
            'zip_code',
            'phone',
            'username'
            //'created_at',
            //'updated_at',
        ],
    ]) ?>

            <div class="">
                <?= Html::a('<i class="faa-pulse  wa animated fa fa-arrow-circle-left"></i> กลับหน้าหลัก', ['index'],
                    ['class' => 'btn btn-warning btn-raised btn-sm']) ?>
            </div>

</div></div>

