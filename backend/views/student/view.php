<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Student */

$this->title = $model->getFullName();
$this->params['breadcrumbs'][] = ['label' => 'จัดการข้อมูลสมาชิก', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

use yii\helpers\Url;
?>
<div class="student-view">
    <div class="card card-bordered style-warning">
        <div class="card-head">
            <div class="tools">
                <div class="btn-group">
                    <div class="btn-group">

                    </div>
                    <a class="btn btn-icon-toggle btn-refresh"><i class="md md-refresh"></i></a>

                </div>
            </div>
            <header> <h1><i class=" faa-pulse animated fa fa-graduation-cap"> </i> <?= Html::encode($this->title) ?></h1></header>
        </div><!--end .card-head -->
        <div class="card-body style-default-bright">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            //'title',
            //'firstname',
            //'lastname',
            'fullName',
            'identification',
            'education',
            'birthday',
            'sex',
            'address',
            'school_id',
            'province',
            'amphur',
            'district',
            'zip_code',
            'phone',
            //'created_at',
            //'updated_at',
        ],
    ]) ?>

</div></div>

