<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\ckeditor\CKEditor;
use dosamigos\switchinput\SwitchBox;
use kartik\widgets\FileInput;
use common\models\Typecourse;
/* @var $this yii\web\View */
/* @var $model common\models\WebCourse */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="web-course-form">

    <?php $form = ActiveForm::begin([
        'options' => ['enctype' => 'multipart/form-data']
    ]); ?>
    <div class="row">

        <div class="col-lg-6">
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-lg-6">
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
    <div class="row">

        <div class="col-lg-6">

            <?= $form->field($model, 'status')->label(false)->widget(SwitchBox::className(),[
                'clientOptions' => [
                    'size' => 'normal',
                    'onColor' => 'success',
                    'offColor' => 'danger'
                ]
            ]);?>
        </div>

        <div class="col-lg-6">
            <?= $form->field($model, 'typecourse_id')->widget(\kartik\select2\Select2::className(),[
                'data'=>\yii\helpers\ArrayHelper::map(Typecourse::find()->all(),'id','name'),
                'language'=>'th',
                'options'=>['placeholder'=>'เลือก'],
                'pluginOptions'=>[
                    'allowClear'=>true
                ],
            ])?>

        </div>

    </div>

    <?= $form->field($model, 'detail')->widget(CKEditor::className(), [
        'options' => ['rows' => 3],
        'preset' => 'Full'

        //'preset' => 'Standard'

    ]) ?>

    <div class="form-group text-center">
        <?= Html::a('<i class="faa-pulse  wa animated fa fa-arrow-circle-left"></i> ยกเลิก', ['index'],
            ['class' => 'btn btn-danger btn-raised']) ?>
        <?= Html::submitButton($model->isNewRecord ? '<i class="fa fa-save"> </i> บันทีก' : '<i class="fa fa-pencil-square-o"> </i>ปรับปรุง', ['class' => $model->isNewRecord ? 'btn  btn-success' : 'btn  btn-primary btn-raised']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
