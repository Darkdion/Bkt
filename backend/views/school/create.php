<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\School */

$this->title = 'สร้างโรงเรียน';
$this->params['breadcrumbs'][] = ['label' => 'จัดการโรงเรียน', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="school-create">

    <div class="card card-bordered style-success">
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

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

        </div></div></div>
