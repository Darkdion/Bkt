<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Teacher */

$this->title = 'ปรับปรุง: ' . ' ' . $model->getFullName();
$this->params['breadcrumbs'][] = ['label' => 'จัดการข้อมูลอาจารย์', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'ปรับปรุง';
?>
<div class="card card-bordered style-info">
    <div class="x_panel">
        <div class="x_title">
            <h2> <i class=" faa-horizontal animated fa fa-edit fa-2x"> </i> <?= Html::encode($this->title) ?></h2>
            <ul class="nav navbar-right panel_toolbox">

            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">

    <?= $this->render('_form', [
        'model' => $model,
        'amphur'=> $amphur,
        'district' =>$district,
    ]) ?>

</div>
</div>

