<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Typecourse */

$this->title = 'สร้างประเภทคอร์ส';
$this->params['breadcrumbs'][] = ['label' => 'จัดการประเภทคอร์ส', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="typecourse-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
