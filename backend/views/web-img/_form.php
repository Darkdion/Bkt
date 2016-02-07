<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\switchinput\SwitchBox;
use kartik\widgets\FileInput;
/* @var $this yii\web\View */
/* @var $model common\models\WebImg */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="web-img-form">
<div>

</div>
    <?php $form = ActiveForm::begin([
        'options' => ['enctype' => 'multipart/form-data']
    ]); ?>
    <div class="row">
        <div class="col-md-6 col-sm-6">
            <div class="form-group">

                <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

            </div>
        </div>
        <div class="col-md-6 col-sm-6">
            <div class="form-group">
                <?= $model->getPhotosViewer(); ?>
                <?=$form->field($model, 'photos')->widget(FileInput::classname(), [
                    'options' => ['accept' => 'image/*'],
                    'pluginOptions' => [
                        'showCaption' => false,
                        'showRemove' => false,
                        'showUpload' => false,
                        'browseClass' => 'btn btn-primary btn-block',
                        'browseIcon' => '<i class="glyphicon glyphicon-camera"></i> ',
                        'browseLabel' =>  'เลือกรูปภาพ'
                    ],
                ]);?>

            </div>
        </div>
    </div>






<div class="form-group">
    <?= $form->field($model, 'status')->label(false)->widget(SwitchBox::className(),[
        'clientOptions' => [
            'size' => 'normal',
            'onColor' => 'success',
            'offColor' => 'danger'
        ]
    ]);?>

</div>
    <div class="form-group ">
        <?= Html::a('<i class="faa-pulse  wa animated fa fa-arrow-circle-left"></i> ยกเลิก', ['index'],
            ['class' => 'btn btn-danger btn-raised']) ?>
        <?= Html::submitButton($model->isNewRecord ? '<i class="fa fa-save"> </i> บันทีก' : '<i class="fa fa-pencil-square-o"> </i>ปรับปรุง', ['class' => $model->isNewRecord ? 'btn  btn-success' : 'btn  btn-primary btn-raised']) ?>
    </div>


    <?php ActiveForm::end(); ?>

</div>
