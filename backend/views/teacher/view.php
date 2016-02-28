<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Teacher */

$this->title = $model->getFullName();
$this->params['breadcrumbs'][] = ['label' => 'Teachers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="teacher-view">

    <div class="x_panel">
        <div class="x_title">
            <h2> <i class=" faa-pulse animated fa fa-user-secret fa-2x"> </i> <?= Html::encode($this->title) ?></h2>
            <ul class="nav navbar-right panel_toolbox">

            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <p>

                <?= Html::a('<i class="faa-shake animated fa fa-plus"></i> สร้างอาจารย์', ['create'], ['class' => 'btn btn-success btn-sm btn-raised']) ?>

                <?= Html::a('<i class="faa-horizontal animated fa fa-edit"></i> ปรับปรุง', ['update', 'id' => $model->id], ['class' => 'btn btn-primary btn-sm btn-raised']) ?>
                <?= Html::a('<i class="faa-pulse animated fa fa-trash"></i> ลบข้อมูล', ['delete', 'id' => $model->id], [
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
            'fullName',
           // 'id',
           // 'title',
           // 'name',
          //  'surname',
            'identification',
            'birthday',
            'sexName',
            'age',
//            'province',
//            'amphur',
//            'district',
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
            'experience',
            'phone',
            'created_at',
            'updated_at',
        ],
    ]) ?>
            <?= Html::a('<i class="faa-pulse  wa animated fa fa-arrow-circle-left"></i> กลับหน้าหลัก', ['index'],
                ['class' => 'btn btn-warning btn-raised btn-sm']) ?>
</div>
    </div>
</div>