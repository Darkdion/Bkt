<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Personnel */

$this->title = 'สร้างพนักงาน';
$this->params['breadcrumbs'][] = ['label' => 'จัดการพนักงาน', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="personnel-create">
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
                'user'=>$user,
                'amphur'=> $amphur,
                'district' =>$district,
            ]) ?>

        </div>
    </div>
