<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $searchModel common\models\CourseSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
use prawee\widgets\ButtonAjax;
use yii\bootstrap\Modal;

use prawee\assets\PwAsset;
PwAsset::register($this);
$this->title = 'จัดการคอร์สเรียน';
$this->params['breadcrumbs'][] = $this->title;

use backend\assets\ViewBoxAsset;
ViewBoxAsset::register($this);
?>
<div class="course-index">
    <?php foreach (Yii::$app->session->getAllFlashes() as $message):; ?>
        <?= \yii\bootstrap\Alert::widget([
            'body'=>ArrayHelper::getValue($message, 'body'),
            'options'=>ArrayHelper::getValue($message, 'options'),
        ])?>
    <?php endforeach; ?>
    <?php Modal::begin(['id'=>'main-modal',
        'size' => 'modal-lg'
    ]);
    echo '<div id="main-content-modal"></div>';
    Modal::end();
    ?>
    <div class="card card-bordered style-primary-dark">
        <div class="card-head">
            <div class="tools">
                <div class="btn-group">
                    <div class="btn-group">

                    </div>
                    <a class="btn btn-icon-toggle btn-refresh"><i class="md md-refresh"></i></a>

                </div>
            </div>
            <header> <h1><i class=" faa-horizontal animated fa fa-book fa-2x"> </i> <?= Html::encode($this->title) ?></h1></header>
        </div><!--end .card-head -->
        <div class="card-body style-default-bright">

            <div class="text-right">
                <?= Html::a('<i class="faa-shake animated fa fa-plus"></i> สร้างคอร์สเรียน', ['create'], ['class' => 'btn btn-success btn-sm btn-raised']) ?>
            </div>


            <?=\yii\widgets\ListView::widget([
                'dataProvider'=>$dataProvider,
                'itemView'=>'/course/_item',
                'itemOptions'=>[
                  'class'=>''
                ],

             ]);


            ?>



        </div>
    </div>
</div>
