<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\WebImg */

$this->title = 'สร้างภาพสไลค์';
$this->params['breadcrumbs'][] = ['label' => 'จัดการภาพสไลค์', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="web-img-create">

    <div class="card">
        <div class="card-head"><header> <h1><i class=" faa-shake animated fa fa-image "> </i> <?= Html::encode($this->title) ?></h1></header></div>
        <div class="card-body">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
   </div>
    </div>
