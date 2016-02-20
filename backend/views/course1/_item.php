<?php
use yii\helpers\Html;
use prawee\widgets\ButtonAjax;
use yii\bootstrap\Modal;


?>


<div class="col-md-4">

    <div class="card">
    <div class="card-body">

        <div style="width: 250px; height: 200px;
        background-size: cover;
                          background-position:center center;
                          background-repeat:no-repeat;
        ">
        <a href="<?=$model->photoViewer?>" class="thumbnail image-link img-responsive" ">
            <img src="<?=$model->photoViewer?>" alt="">
        </a>
        </div>

                <div class="caption">
                    <h3><?=$model->name ?></h3>
                    <div class="text-right">


                    <p>ราคา : <span class="badge"><?=$model->price ?></span></p>

                    <?=  ButtonAjax::widget([
                        'name'=>'<i class="faa-shake animated fa fa-eye "></i>',
                        'route'=>['view','id'=>$model->id],
                        'modalId'=>'#main-modal',
                        'modalContent'=>'#main-content-modal',
                        'options'=>[
                            'class'=>'btn ink-reaction btn-raised btn-sm btn-primary',
                            'title'=>'แสดง',
                        ]
                    ]);?>
                    <?=  ButtonAjax::widget([
                        'name'=>'<i class="faa-bounce animated fa fa-edit "></i>',
                        'route'=>['update','id'=>$model->id],
                        'modalId'=>'#main-modal',
                        'modalContent'=>'#main-content-modal',
                        'options'=>[
                            'class'=>'btn ink-reaction btn-raised btn-sm btn-warning ',
                            'title'=>'ปรับปรุง',
                        ]
                    ]);?>

                    <?= Html::a('<i class="faa-horizontal animated fa fa-trash"></i>', ['delete', 'id' => $model->id], [
                        'class' => 'btn ink-reaction btn-raised btn-sm btn-danger ',
                        'data' => [
                            'confirm' => 'Are you sure you want to delete this item?',
                            'method' => 'post',
                        ],
                    ]) ?>

                    </div>
                </div>
            </div>

        </div><!--end .card-body -->

</div>
<?php
$this->registerJs(
    " "
);

?>
