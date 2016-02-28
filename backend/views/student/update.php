<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Student */

$this->title = 'ปรับปรุง: ' . ' ' . $model->getFullName();
$this->params['breadcrumbs'][] = ['label' => 'จัดการข้อมูล', 'url' => ['index']];

$this->params['breadcrumbs'][] = ['label' => 'ปรับปรุง', 'url' => ['update']];
?>
<div class="student-update">

    <div class="x_panel">
        <div class="x_title">
            <h2> <i class=" faa-pulse animated fa fa-edit"> </i> <?= Html::encode($this->title) ?></h2>
            <ul class="nav navbar-right panel_toolbox">

            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">

    <?= $this->render('_form', [
        'model' => $model,
        'amphur'=> $amphur,
        'district' =>$district,
        'user'=>$user,
    ]) ?>

</div>
    </div>
