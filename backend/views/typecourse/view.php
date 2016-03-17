<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Typecourse */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Typecourses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="panel">
    <div class="panel-body">
<div class="typecourse-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('แก้ไข', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('ลบข้อมูล', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'คุณต้องการลบใช่หรือไม่?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'created_at:datetime',
            'updated_at:datetime',
        ],
    ]) ?>

    <div class="text-left">
        <?= Html::a('หลับหน้าหลัก', ['index', 'id' => $model->id], ['class' => 'btn btn-warning']) ?>
    </div>

</div></div></div>
