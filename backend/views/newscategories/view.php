<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Newscategories */

$this->title ='แสดงรายละเอียดหมวดหมู่ รหัสที่ :'. $model->id;
$this->params['breadcrumbs'][] = ['label' => 'จัดการหมวดหมู่', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="newscategories-view">


        <div class="card">
            <div class="card-head"><header> <h1><i class=" faa-shake animated fa fa-newspaper-o "> </i> <?= Html::encode($this->title) ?></h1></header></div>
            <div class="card-body">



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
                        ['class' => 'btn btn-danger btn-raised btn-sm']) ?>
                </div>
    </div>
</div>
</div>

