<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\WebContact */

$this->title = 'สร้างการติดต่อ';
$this->params['breadcrumbs'][] = ['label' => 'จัดการการติดต่อ', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="web-contact-create">
    <div class="card card-bordered style-success ">
        <div class="card-head">
            <div class="tools">
                <div class="btn-group">
                    <div class="btn-group">

                    </div>
                    <a class="btn btn-icon-toggle btn-refresh"><i class="md md-refresh"></i></a>

                </div>
            </div>
            <header> <h1><i class=" faa-horizontal animated fa fa-map-marker fa-2x"> </i> <?= Html::encode($this->title) ?></h1></header>
        </div><!--end .card-head -->
        <div class="card-body style-default-bright">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

        </div></div></div>
