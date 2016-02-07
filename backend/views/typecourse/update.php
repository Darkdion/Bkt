<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Typecourse */

$this->title = 'ปรับปรุงรหัสที่ : ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'จัดการประเภทคอร์ส', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'ปรับปรุง';
?>
<div class="typecourse-update">

    <div class="card card-bordered style-warning">
        <div class="card-head">
            <div class="tools">
                <div class="btn-group">
                    <div class="btn-group">

                    </div>
                    <a class="btn btn-icon-toggle btn-refresh"><i class="md md-refresh"></i></a>

                </div>
            </div>
            <header> <h1><i class=" faa-horizontal animated fa fa-pencil-square-o fa-2x"> </i> <?= Html::encode($this->title) ?></h1></header>
        </div><!--end .card-head -->
        <div class="card-body style-default-bright">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

        </div></div></div>
