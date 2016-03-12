<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = 'ข้อมูลการใช้งาน';
//$this->params['breadcrumbs'][] = ['label' => 'ข้อมูลการใช้งาน', 'url' => ['index']];

?>

<div class="user-update">



    <?= $this->render('_form', [
        'model' => $model,
       // 'model2' => $model2,
    ]) ?>

</div>
