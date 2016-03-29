<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Personnel */

$this->title = $model->fullName;
$this->params['breadcrumbs'][] = ['label' => 'จัดการพนักงาน', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="personnel-view">
    <div class="x_panel">
        <div class="x_title">
            <h2> <i class=" faa-pulse animated fa fa-venus"> </i> <?= Html::encode($this->title) ?></h2>
            <ul class="nav navbar-right panel_toolbox">
             <h3>สถานะการทำงาน <?=$model->status?></h3>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <?php

            if(empty($model->expire_date)):?>


                <p>

                    <?= Html::a('<i class="faa-shake animated fa fa-plus"></i> สร้างพนักงาน', ['create'], ['class' => 'btn btn-success btn-sm btn-raised']) ?>

                    <?= Html::a('<i class="faa-horizontal animated fa fa-edit"></i> ปรับปรุง', ['update', 'id' => $model->per_id], ['class' => 'btn btn-primary btn-sm btn-raised']) ?>
                    <?= Html::a('<i class="faa-pulse animated fa fa-user"></i> ลาออก', ['quit', 'id' => $model->per_id,'user_id'=>$model->user_id], [
                        'class' => 'btn btn-danger btn-sm btn-raised',
                        'data' => [
                            'confirm' => 'คุณต้องการทำรายการใช่หรือใหม่?',
                            'method' => 'post',
                        ],
                    ]) ?>
                    <?php else:   ?>

                    <?php endif;   ?>
                    <a  href="index.php?r=manage-user/update&id=<?php echo $model->user_id; ?>"
                             class="btn btn-info btn-sm ">
                        <i class="glyphicon glyphicon-share-alt"></i>
                        แก้ไขการใช้งาน
                    </a>

                </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'per_id',
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
            'status',
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
