<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;

use kartik\widgets\DatePicker;
use kartik\widgets\FileInput;

use common\models\Typecourse;
use common\models\Teacher;

/* @var $this yii\web\View */
/* @var $model common\models\Course */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="course-form">

    <?php $form = ActiveForm::begin([
        'options' => ['enctype' => 'multipart/form-data']
    ]); ?>
    <div class=" text-danger ara">
        <h4><?= $form->errorSummary($model); ?></h4>
    </div>
    <div class="row">

        <div class="col-md-6 col-sm-6 ">
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-6 col-sm-6 ">


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

        <div class="col-md-4">
            <?= $form->field($model, 'price')->textInput() ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'date_s')->widget(DatePicker::classname(), [
                'options' => ['placeholder' => 'วันที่เริ่ม...'],
                'language' => 'th',
                'pluginOptions' => [
                    'autoclose'=>true,
                    'format' => 'yyyy-m-d',
                    'todayHighlight' => true,
                ]
            ]);?>
        </div>
        <div class="col-md-4">


            <?= $form->field($model, 'date_c')->widget(DatePicker::classname(), [
                'options' => ['placeholder' => 'วันที่สิ้นสุด ...'],
                'language' => 'th',
                'pluginOptions' => [
                    'autoclose'=>true,
                    'format' => 'yyyy-m-d',
                    'todayHighlight' => true,
                ]
            ]);?>
        </div>


        <div class="col-md-6">
            <?= $form->field($model, 'teacher_id')->widget(\kartik\select2\Select2::className(),[
                'data'=>\yii\helpers\ArrayHelper::map(Teacher::find()->all(),'id','fullName'),
                'language'=>'th',
                'options'=>['placeholder'=>'เลือก'],
                'pluginOptions'=>[
                    'allowClear'=>true
                ],
            ])?>
        </div>
        <div class="col-md-6">
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

    <?= $form->field($model, 'detail')->widget(\dosamigos\ckeditor\CKEditor::className(), [
        'options' => ['rows' => 1],
        'preset' => 'basic'

        //'preset' => 'Standard'

    ]) ?>
    <div class="form-group text-center ">
        <?= Html::a('<i class="faa-pulse  wa animated fa fa-arrow-circle-left"></i> ยกเลิก', ['index'],
            ['class' => 'btn btn-danger btn-raised']) ?>
        <?= Html::submitButton($model->isNewRecord ? '<i class="faa-wrench animated fa fa-save"> </i> บันทีก' : '<i class="faa-wrench animated fa fa-pencil-square-o"> </i>ปรับปรุง', ['class' => $model->isNewRecord ? 'btn  btn-success' : 'btn  btn-primary btn-raised']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

