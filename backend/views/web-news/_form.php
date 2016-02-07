<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\switchinput\SwitchBox;
use common\models\Newscategories;
use dosamigos\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model common\models\WebNews */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="web-news-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-sm-6 col-md-6">
            <div class="form-group">
                <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
            </div>
        </div>
        <div class="col-sm-6 col-md-6">
            <div class="form-group">
                <?= $form->field($model, 'newscategories_id')->widget(\kartik\select2\Select2::className(),[
                    'data'=>\yii\helpers\ArrayHelper::map(Newscategories::find()->all(),'id','name'),
                    'language'=>'th',
                    'options'=>['placeholder'=>'เลือก'],
                    'pluginOptions'=>[
                        'allowClear'=>true
                    ],
                ])?>
            </div>
        </div>

    </div>

    <?= $form->field($model, 'detail')->widget(CKEditor::className(), [
        'options' => ['rows' => 5],
        'preset' => 'Full'

        //'preset' => 'Standard'

    ]) ?>




    <?= $form->field($model, 'status')->label(false)->widget(SwitchBox::className(),[
        'clientOptions' => [
            'size' => 'normal',
            'onColor' => 'success',
            'offColor' => 'danger'
        ]
    ]);?>





    <div class="form-group text-center ">
        <?= Html::a('<i class="faa-pulse  wa animated fa fa-arrow-circle-left"></i> ยกเลิก', ['index'],
            ['class' => 'btn btn-danger btn-raised']) ?>
        <?= Html::submitButton($model->isNewRecord ? '<i class="fa fa-save"> </i> บันทีก' : '<i class="fa fa-pencil-square-o"> </i>ปรับปรุง', ['class' => $model->isNewRecord ? 'btn  btn-success' : 'btn  btn-primary btn-raised']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
