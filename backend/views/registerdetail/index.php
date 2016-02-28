<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\RegisterdetailSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Registerdetails';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="registerdetail-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Registerdetail', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'register_course_id',
            'course_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
