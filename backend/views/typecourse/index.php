<?php

use yii\helpers\Html;
use yii\grid\GridView;
use prawee\assets\PwAsset;
/* @var $this yii\web\View */
/* @var $searchModel common\models\TypecourseSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
PwAsset::register($this);
$this->title = 'จัดการประเภทคอร์ส';
$this->params['breadcrumbs'][] = $this->title;

use prawee\widgets\ButtonAjax;
use yii\bootstrap\Modal;
?>
<div class="typecourse-index">

    <div class="card card-bordered ">
        <div class="card-head">
            <div class="tools">
                <div class="btn-group">
                    <div class="btn-group">

                    </div>
                    <a class="btn btn-icon-toggle btn-refresh"><i class="md md-refresh"></i></a>

                </div>
            </div>
            <header> <h1><i class=" faa-pulse animated fa fa-calendar fa-2x"> </i> <?= Html::encode($this->title) ?></h1></header>
        </div><!--end .card-head -->
        <div class="card-body style-default-bright">


            <?php Modal::begin(['id'=>'main-modal']);
            echo '<div id="main-content-modal"></div>';
            Modal::end();
            ?>
            <div class="text-right">
                <?=  ButtonAjax::widget([
                    'name'=>'<i class="faa-shake animated fa fa-plus"></i> สร้างประเภทคอร์ส',
                    'route'=>['create'],
                    'modalId'=>'#main-modal',
                    'modalContent'=>'#main-content-modal',
                    'options'=>[
                        'class'=>'btn btn-success btn-sm btn-raised',
                        'title'=>'Button for create application',
                    ]
                ]);?>




            </div>


            <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'created_at',
            'updated_at',

            ['class' => 'yii\grid\ActionColumn',
                'buttons' => [
                    'view' => function ($url, $model, $key) {
                        return Html::a('<span class="glyphicon glyphicon-eye-open btn btn-icon-toggle"></span>','#', [
                            'class' => 'activity-view-link',
                            'title' => 'เปิดดูข้อมูล',
                            'data-toggle' => 'modal',
                            'data-target' => '#main-modal',
                            'data-id' => $key,
                            'data-pjax' => '0',

                        ]);
                    },
                    'update' => function ($url, $model, $key) {
                        return Html::a('<span class="glyphicon glyphicon-pencil btn btn-icon-toggle"></span>','#', [
                            'class' => 'activity-update-link',
                            'title' => 'แก้ไขข้อมูล',
                            'data-toggle' => 'modal',
                            'data-target' => '#main-modal',
                            'data-id' => $key,
                            'data-pjax' => '0',

                        ]);
                    },

                ]



            ],
        ],
    ]); ?>

        </div></div></div>
<?php $this->registerJs('
        function init_click_handlers(){
            $("#activity-create-link").click(function(e) {
                    $.get(
                        "create",
                        function (data)
                        {
                            $("#activity-modal").find(".modal-body").html(data);
                            $(".modal-body").html(data);
                            $(".modal-title").html("เพิ่มข้อมูลโรงเรียน");
                            $("#activity-modal").modal("show");
                        }
                    );
                });
            $(".activity-view-link").click(function(e) {
                    var fID = $(this).closest("tr").data("key");
                    $.get(
                        "?r=typecourse/view",
                        {
                            id: fID
                        },
                        function (data)
                        {
                            $("#activity-modal").find(".modal-body").html(data);
                            $(".modal-body").html(data);
                            $(".modal-title").html("เปิดดูข้อมูลโรงเรียน");
                            $("#activity-modal").modal("show");
                        }
                    );
                });
            $(".activity-update-link").click(function(e) {
                    var fID = $(this).closest("tr").data("key");
                    $.get(
                        "?r=typecourse/update",
                        {
                            id: fID
                        },
                        function (data)
                        {
                            $("#activity-modal").find(".modal-body").html(data);
                            $(".modal-body").html(data);
                            $(".modal-title").html("แก้ไขข้อมูลโรงเรียน");
                            $("#activity-modal").modal("show");
                        }
                    );
                });

        }
        init_click_handlers(); //first run
        $("#customer_pjax_id").on("pjax:success", function() {
          init_click_handlers(); //reactivate links in grid after pjax update
        });');?>