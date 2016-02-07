<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Typecourse */

$this->title = 'Create Typecourse';
$this->params['breadcrumbs'][] = ['label' => 'Typecourses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="typecourse-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
