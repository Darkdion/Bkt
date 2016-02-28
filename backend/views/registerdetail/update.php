<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Registerdetail */

$this->title = 'Update Registerdetail: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Registerdetails', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="registerdetail-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
