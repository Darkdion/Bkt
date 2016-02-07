<?php

use yii\helpers\Html;
use yii\grid\GridView;
use prawee\assets\PwAsset;
/* @var $this yii\web\View */
/* @var $searchModel common\models\TypecourseSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
PwAsset::register($this);
$this->title = 'Typecourses';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="typecourse-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Typecourse', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'created_at',
            'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
