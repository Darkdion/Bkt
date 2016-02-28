<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Personnel */

$this->title = 'Update Personnel: ' . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Personnels', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->per_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="personnel-update">

    <div class="card card-bordered style-primary">
        <div class="card-head">
            <div class="tools">
                <div class="btn-group">
                    <div class="btn-group">

                    </div>
                    <a class="btn btn-icon-toggle btn-refresh"><i class="md md-refresh"></i></a>

                </div>
            </div>
            <header> <h1><i class=" faa-pulse animated fa fa-users"> </i> <?= Html::encode($this->title) ?></h1></header>
        </div><!--end .card-head -->
        <div class="card-body style-default-bright">

    <?= $this->render('_form', [
        'model' => $model,
        'amphur'=> $amphur,
        'district' =>$district,
        'user'=>$user,
    ]) ?>

        </div></div>
