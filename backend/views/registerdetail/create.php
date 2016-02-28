<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Registerdetail */

$this->title = 'Create Registerdetail';
$this->params['breadcrumbs'][] = ['label' => 'Registerdetails', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="registerdetail-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
