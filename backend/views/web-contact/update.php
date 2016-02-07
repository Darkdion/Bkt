<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\WebContact */

$this->title = 'ปรับปรุงรหัสที่ : ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'จัดการการติดต่อ', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'ปรับปรุง';
?>
<div class="web-contact-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
