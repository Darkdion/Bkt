<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\WebCourse */

$this->title = 'สร้างคอร์สเรียนและความรู้ทั่วไป';
$this->params['breadcrumbs'][] = ['label' => 'จัดการคอร์สเรียนและความรู้ทั่วไป', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="web-course-create">


    <div class="card card-bordered style-success ">
        <div class="card-head">
            <div class="tools">
                <div class="btn-group">
                    <div class="btn-group">

                    </div>
                    <a class="btn btn-icon-toggle btn-refresh"><i class="md md-refresh"></i></a>

                </div>
            </div>
            <header> <h1><i class=" faa-pulse animated fa fa-book fa-2x"> </i> <?= Html::encode($this->title) ?></h1></header>
        </div><!--end .card-head -->
        <div class="card-body style-default-bright">

            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>

        </div></div></div>
