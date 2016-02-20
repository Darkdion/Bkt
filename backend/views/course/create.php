<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Course */

$this->title = 'สร้างคอร์สเรียน';
$this->params['breadcrumbs'][] = ['label' => 'จัดการคอร์สเรียน', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="course-create">

    <div class="card">
        <div class="card-head"><header> <h1><i class=" faa-float animated fa fa-plus-circle "> </i> <?= Html::encode($this->title) ?></h1></header></div>
        <div class="card-body">


        <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

        </div>
    </div>
</div>
