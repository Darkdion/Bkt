<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\WebNews */

$this->title = 'สร้างข่าว';
$this->params['breadcrumbs'][] = ['label' => 'จัดการข่าวประชาสัมพันธ์', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="web-news-create">
    <div class="card">
        <div class="card-head"><header> <h1><i class=" faa-float animated fa fa-plus-circle "> </i> <?= Html::encode($this->title) ?></h1></header></div>
        <div class="card-body">




    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
    </div>
</div>