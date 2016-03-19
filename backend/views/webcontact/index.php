<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Webcontact */

$this->title = 'จัดการการติดต่อ ' ;

$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['index', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'จัดการการติดต่อ';
?>
<div class="webcontact-update container">


    <div class="panel">
    <div class="panel-body">
        <h1><?= Html::encode($this->title) ?></h1>
        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>
    </div>
    </div>


</div>
