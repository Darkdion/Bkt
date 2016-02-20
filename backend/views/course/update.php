<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Course */

$this->title = 'ปรับปรุง รหัสที่ : ' . ' ' . $model->cod_id;
$this->params['breadcrumbs'][] = ['label' => 'จัดการคอร์สเรียน', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'ปรับปรุง';
?>
<div class="course-update">

    <div class="card">
        <div class="card-head"><header> <h1><i class=" faa-shake animated fa fa-edit "> </i> <?= Html::encode($this->title) ?></h1></header></div>
        <div class="card-body">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

        </div></div></div>
