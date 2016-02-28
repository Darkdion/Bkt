<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;




use yii\helpers\ArrayHelper;
use common\models\Amphur;
use common\models\Province;
use common\models\District;
use kartik\widgets\DepDrop;
use yii\helpers\Url;

?>

<div class="personnel-form">

    <?php $form = ActiveForm::begin([
        'options'=>['class'=>'form-horizontal'],
    ]); ?>

    <div class="row">
        <div class="col-xs-4 col-sm-2 col-md-2">
            <?= $form->field($model, 'title')->dropDownList($model->getItemTitle(),
                ['prompt' => 'เลือกคำนำหน้า..']
            ) ?>

        </div>
        <div class="col-xs-4 col-sm-5 col-md-5">
            <?= $form->field($model, 'firstname')->textInput(['maxlength' => 50]) ?>
        </div>
        <div class="col-xs-4 col-sm-5 col-md-5">
            <?= $form->field($model, 'lastname')->textInput(['maxlength' => 50]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-3 col-md-3">
            <?= $form->field($model, 'sex')->radioList($model->getItemSex()) ?>
        </div>
        <div class="col-sm-3 col-md-3">
            <?= $form->field($model, 'identification')->hiddenInput()->widget(\yii\widgets\MaskedInput::classname(), [
                'mask' => '9-9999-99999-99-9',
                'clientOptions'=>[
                    'removeMaskOnSubmit'=>true //กรณีไม่ต้องการให้มันบันทึก format ลงไปด้วยเช่น 9-9999-99999-999 ก็จะเป็น 9999999999999
                ],
                'options'=>['class'=>'form-control',
                    'placeholder' => 'เลขบัตรประชาชน',
                ]
            ]) ?>

        </div>

        <div class="col-sm-3 col-col-md-3">
            <?= $form->field($model, 'birthday')->widget(\kartik\widgets\DatePicker::classname(), [
                'options' => ['placeholder' => ' วันเกิด'],
                'language' => 'th',
                'pluginOptions' => [
                    'autoclose'=>true,
                    'format' => 'yyyy/m/d',
                    'todayHighlight' => true,
                    'viewformat' => 'd/m/yyyy',
                ]
            ]);?>
        </div>
        <div class="col-sm-3 col-col-md-3">
            <?=$form->field($model,'marital')->dropDownList($model->getItemMarital()
                ,[
                    'prompt'=>'เลือกสถานะ'
                ]) ?>
        </div>
    </div>

    <div class="page-header">
        <h4>ข้อมูลสำหรับการติดต่อ </h4>
    </div>



    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

    <div class="row">
        <div class="col-sm-3 col-md-3">
            <?= $form->field($model, 'province')->dropdownList(
                ArrayHelper::map(Province::find()->all(),
                    'PROVINCE_ID',
                    'PROVINCE_NAME'),
                [
                    'id'=>'ddl-province',
                    'prompt'=>'เลือกจังหวัด'
                ]); ?>
        </div>
        <div class="col-sm-3 col-md-3">
            <?= $form->field($model, 'amphur')->widget(DepDrop::classname(), [
                'options'=>['id'=>'ddl-amphur'],
                'data'=> $amphur,
                'pluginOptions'=>[
                    'depends'=>['ddl-province'],
                    'placeholder'=>'เลือกอำเภอ...',
                    'url'=>Url::to(['/student/get-amphur'])
                ]
            ]); ?>
        </div>
        <div class="col-sm-3 col-md-3">
            <?= $form->field($model, 'district')->widget(DepDrop::classname(), [
                'data' =>$district,
                'pluginOptions'=>[
                    'depends'=>['ddl-province', 'ddl-amphur'],
                    'placeholder'=>'เลือกตำบล...',
                    'url'=>Url::to(['/student/get-district'])
                ]
            ]); ?>
        </div>
        <div class="col-sm-3 col-md-3">
            <?= $form->field($model, 'zip_code')->textInput(['maxlength' => 5]) ?>
        </div>
    </div>




<div class="row">
    <div class="col-sm-3 col-md-3">
        <?=
        $form->field($user, 'email')->hiddenInput()->textInput(['placeholder'=>'example@example.com...']);

        ?>

    </div>
    <div class="col-sm-3 col-md-3">
        <?= $form->field($model, 'phone')->hiddenInput()->widget(\yii\widgets\MaskedInput::className(),[
            'mask'=>'999-999-9999',

            'clientOptions'=>[
                'removeMaskOnSubmit'=>true //กรณีไม่ต้องการให้มันบันทึก format ลงไปด้วยเช่น 9-9999-99999-999 ก็จะเป็น 9999999999999
            ],
            'options'=>['class'=>'form-control',
                'placeholder' => 'โทรศัพท์มือถือ',
            ]
        ]) ?>
    </div>
    <div class="col-sm-3 col-md-3">
        <?= $form->field($model, 'salary')->textInput() ?>
    </div>
    <div class="col-sm-3 col-md-3">
        <?= $form->field($model, 'expire_date')->widget(\kartik\widgets\DatePicker::classname(), [
            'options' => ['placeholder' => ' วันที่ลาออก'],
            'language' => 'th',
            'pluginOptions' => [
                'autoclose'=>true,
                'format' => 'yyyy/m/d',
                'viewMode'=> 'years',
                'todayHighlight' => true,

            ]
        ]);?>

    </div>
</div>

    <div class="page-header">
        <h4>ข้อมูลสำหรับใช้งาน </h4>
    </div>
    <div class="row">
        <div class="col-sm-4 col-md-4">
            <?= $form->field($user, 'username')->hiddenInput()->textInput(['maxlength' => true,'placeholder' => 'กรอกข้อมูลชื่อผู้ใช้งาน']) ?>
        </div>

        <div class="col-sm-4 col-md-4">
            <?= $form->field($user, 'password')->hiddenInput()->passwordInput(['placeholder' => 'กรอกรหัสผ่าน']) ?>
        </div>
        <div class="col-sm-4 col-md-4">

            <?= $form->field($user, 'confirm_password')->hiddenInput()->passwordInput(['placeholder' => 'กรอกรหัสผ่านยืนยัน']) ?>
        </div>

    </div>





    <div class="form-group text-center ">
        <?= Html::a('<i class="faa-pulse  wa animated fa fa-arrow-circle-left"></i> ยกเลิก', ['index'],
            ['class' => 'btn btn-danger btn-raised']) ?>
        <?= Html::submitButton($model->isNewRecord ? '<i class="faa-wrench animated fa fa-save"> </i> บันทีก' : '<i class="faa-wrench animated fa fa-pencil-square-o"> </i>ปรับปรุง', ['class' => $model->isNewRecord ? 'btn  btn-success' : 'btn  btn-primary btn-raised']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
