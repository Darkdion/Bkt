<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\WebImg */

$this->title = 'ปรับปรุงภาพสไลค์รหัส : ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'จัดการภาพสไลค์', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'ปรับปรุงภาพสไลค์';
?>
<div class="web-img-update">

    <div class="card">
        <div class="card-head"><header> <h1><i class=" faa-shake animated fa fa-image "> </i> <?= Html::encode($this->title) ?></h1></header></div>
        <div class="card-body">


        <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

        </div></div></div>
