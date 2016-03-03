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

    <div class="x_panel">
        <div class="x_title">
            <h2> <i class=" faa-pulse animated fa fa-users"> </i> <?= Html::encode($this->title) ?></h2>
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

        </div></div>
