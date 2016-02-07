<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\WebNews */

$this->title = 'ปรับปรุงข่าว รหัสที่ : ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'จัดการข่าว', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'ปรับปรุง';
?>
<div class="web-news-update">

    <div class="card">
        <div class="card-head"><header> <h1><i class=" faa-float animated fa fa-plus-circle "> </i> <?= Html::encode($this->title) ?></h1></header></div>
        <div class="card-body">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

        </div>
    </div>
</div>
