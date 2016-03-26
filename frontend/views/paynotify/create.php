<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use kartik\widgets\FileInput;

/* @var $this yii\web\View */
/* @var $model common\models\Paynotify */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="panel">
    <div class="panel-heading text-center">
        <h2><i class="fa fa-credit-card fa-2x"> </i> แจ้งชำระเงิน</h2>
    </div>
    <div class="panel-body">


        <div class="paynotify-form">

            <?php $form = ActiveForm::begin([


                'options' => [
                    'class' => 'form-horizontal',
                    'enctype' => 'multipart/form-data']

            ]); ?>
            <div class="row">
                <div class="form-group">
                    <label class="col-sm-4 control-label">เลขที่ใบเสร็จ</label>
                    <div class="col-sm-4">
                        <input type="text" disabled class="form-control" value="<?= $register->id ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">วันที่ชำระ</label>
                    <div class="col-sm-8">
                        <?= $form->field($model, 'date_pay')->label(false)->widget(
                            \dosamigos\datepicker\DatePicker::className(), [
                            // inline too, not bad
                            'inline' => false,

                            'language' => 'th',
                            'clientOptions' => [
                                'todayHighlight' => true,
                                'autoclose' => true,
                                'defaultDate' => 'd-m-Y',
                                'format' => 'yyyy/m/d '
                            ]
                        ]); ?>

                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">ยอดที่ชำระ</label>
                    <div class="col-sm-8">

                        <?= $form->field($model, 'price_pay')->label(false)->textInput() ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">หลักฐานการชำระ</label>
                    <div class="col-sm-8">
                        <?= $form->field($model, 'photos')->label(false)->widget(FileInput::classname(), [
                            'options' => ['accept' => 'image/*'],
                            'pluginOptions' => [
                                'showCaption' => false,
                                'showRemove' => false,
                                'showUpload' => false,
                                'browseClass' => 'btn btn-primary btn-block',
                                'browseIcon' => '<i class="glyphicon glyphicon-camera"></i> ',
                                'browseLabel' => 'เลือกรูปภาพ'
                            ],
                        ]); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">หลักฐานการชำระ</label>
                    <div class="col-sm-8">
                        <?= $form->field($model, 'verifyCode')->widget(\yii\captcha\Captcha::className(), [
                            'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                        ]) ?>
                    </div>
                </div>

            <div class="form-group text-center">
                <div class="col-sm-2"></div>
                <div class="col-sm-8">
                    <?= Html::a('<i class="fa fa-ban"> </i> ยกเลิกแจ้งชำระ',['register-course/registerdetail'],['class'=>'btn-danger btn btn-lg']) ?>

                <?= Html::submitButton($model->isNewRecord ? '<i class="fa fa-save"> </i>บันทึกแจ้งชำระ' : 'แก้ไขแจ้งชำระ', ['class' => $model->isNewRecord ? 'btn btn-success btn-lg ' : 'btn btn-primary']) ?>
            </div>
            </div>
            <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>