<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

use kartik\widgets\DatePicker;

use yii\helpers\ArrayHelper;
use common\models\Amphur;
use common\models\Province;
use common\models\District;
use kartik\widgets\DepDrop;

use kartik\widgets\FileInput;

use yii\helpers\VarDumper;
/* @var $this yii\web\View */
/* @var $model common\models\Student */
/* @var $form yii\widgets\ActiveForm */
Yii::$app->layout='signup';

?>

<div class="student-form">

    <div class="panel panel-default">


        <div class="panel-heading">

            <h2 class="panel-title" style="font-size: 18pt; color: #DF006E">
                <img src="../web/logo/logo.png" width="100" class="img-responsive text-center" alt="">
                สมัครสมาชิก </h2>

        </div>
        <div class="panel-body">
            <div class="text-right"> <a href="<?= Url::to(['site/index'])?>" class="btn btn-danger  btn-xs"> <i class="glyphicon glyphicon-fast-backward"></i> กลับหน้าหลัก</a></div>
    <?php $form = ActiveForm::begin([


    ])   ?>




<br>

    <div class="form-group row">
        <div class="col-sm-2"></div>
        <label for="inputEmail3" class="col-sm-2 form-control-label">คำนำหน้า</label>
        <div class="col-sm-8">
            <?= $form->field($model, 'title')->label(false)->radioList($model->getItemTitle(),
                ['prompt' => 'เลือกคำนำหน้า..']
            ) ?>

        </div>
    </div>
            <div class="form-group row">
                <div class="col-sm-2"></div>
                <label for="inputEmail3" class="col-sm-2 form-control-label">ชื่อ-นามสกุล</label>
                <div class="col-sm-4">
                    <?= $form->field($model, 'firstname')->label(false)->textInput(['placeholder' => 'กรอกชื่อ',]) ?>

                </div>
                <div class="col-sm-4">
                    <?= $form->field($model, 'lastname')->label(false)->textInput(['placeholder' => 'กรอกนามสกุล',]) ?>

                </div>
            </div>

    <div class="form-group row">
        <div class="col-sm-2"></div>
        <label for="inputEmail3" class="col-sm-2 form-control-label">เพศ</label>
        <div class="col-sm-8">

            <?= $form->field($model, 'sex')->label(false)->radioList($model->getItemSex()) ?>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-2"></div>
        <label for="inputEmail3" class="col-sm-2 form-control-label">เลขบัตรประชาชน</label>
        <div class="col-sm-8">

            <?= $form->field($model, 'identification')->label(false)->hiddenInput()->widget(\yii\widgets\MaskedInput::classname(), [
                'mask' => '9-9999-99999-99-9',
                'clientOptions'=>[
                    'removeMaskOnSubmit'=>true //กรณีไม่ต้องการให้มันบันทึก format ลงไปด้วยเช่น 9-9999-99999-999 ก็จะเป็น 9999999999999
                ],
                'options'=>['class'=>'form-control',
                    'placeholder' => 'เลขบัตรประชาชน',
                ]
            ]) ?>

        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-2"></div>
        <label for="inputEmail3" class="col-sm-2 form-control-label">วันเกิด</label>
        <div class="col-sm-8">
            <div class="col-sm-6 col-md-6">
                <?= $form->field($model, 'birthday')->label(false)->widget(DatePicker::classname(), [
                    'options' => ['placeholder' => ' วันเกิด'],
                    'language' => 'th',
                    'pluginOptions' => [
                        'autoclose'=>true,
                        'format' => 'yyyy/m/d',
                        'todayHighlight' => true,
                    ]
                ]);?>
            </div>

        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-2"></div>
        <label for="inputEmail3" class="col-sm-2 form-control-label">ระดับการศึกษา</label>
        <div class="col-sm-8">
            <div class="col-sm-6 ">
                <?=$form->field($model,'education')->label(false)->dropDownList($model->getItemEducation()
                    ,[
                        'prompt'=>'เลือกระดับการศึกษา'
                    ]) ?>
            </div>

        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-2"></div>
        <label for="inputEmail3" class="col-sm-2 form-control-label">สถานศึกษา</label>
        <div class="col-sm-8">
            <div class="col-sm-6 ">
                <?= $form->field($model,'school_id')->label(false)->dropDownList( ArrayHelper::map(\common\models\School::find()->all(),'id','name'),
                    ['prompt'=>'เลือกโรงเรียน'] )?>
            </div>

        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-2"></div>
        <label for="inputEmail3" class="col-sm-2 form-control-label">บ้านเลขที่, ถนน, หมู่บ้าน</label>
        <div class="col-sm-8">

            <?= $form->field($model, 'address')->label(false)->textarea(['rows'=>3]) ?>


        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-2"></div>
        <label for="inputEmail3" class="col-sm-2 form-control-label">จังหวัด,อำเภอ,ตำบล</label>
        <div class="col-sm-8">


            <div class="col-sm-4 ">
                <?= $form->field($model, 'province')->label(false)->dropdownList(
                    ArrayHelper::map(Province::find()->all(),
                        'PROVINCE_ID',
                        'PROVINCE_NAME'),
                    [
                        'id'=>'ddl-province',
                        'prompt'=>'เลือกจังหวัด'
                    ]); ?>
            </div>
            <div class="col-sm-4 ">
                <?= $form->field($model, 'amphur')->label(false)->widget(DepDrop::classname(), [
                    'options'=>['id'=>'ddl-amphur'],
                    'data'=> $amphur,
                    'pluginOptions'=>[
                        'depends'=>['ddl-province'],
                        'placeholder'=>'เลือกอำเภอ...',
                        'url'=>Url::to(['/signup/get-amphur'])
                    ]
                ]); ?>
            </div>
            <div class="col-sm-4 ">
                <?= $form->field($model, 'district')->label(false)->widget(DepDrop::classname(), [
                    'data' =>$district,
                    'pluginOptions'=>[
                        'depends'=>['ddl-province', 'ddl-amphur'],
                        'placeholder'=>'เลือกตำบล...',
                        'url'=>Url::to(['/signup/get-district'])
                    ]
                ]); ?>
            </div>

        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-2"></div>
        <label for="inputEmail3" class="col-sm-2 form-control-label">เบอร์โทร</label>
        <div class="col-sm-8">

            <?= $form->field($model, 'phone')->label(false)->hiddenInput()->widget(\yii\widgets\MaskedInput::className(),[
                'mask'=>'999-999-9999',

                'clientOptions'=>[
                    'removeMaskOnSubmit'=>true //กรณีไม่ต้องการให้มันบันทึก format ลงไปด้วยเช่น 9-9999-99999-999 ก็จะเป็น 9999999999999
                ],
                'options'=>['class'=>'form-control',
                    'placeholder' => 'โทรศัพท์มือถือ',
                ]
            ]) ?>


        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-2"></div>
        <label for="inputEmail3" class="col-sm-2 form-control-label">E-mail</label>
        <div class="col-sm-8">


            <?=
            $form->field($user, 'email')->label(false)->hiddenInput()->textInput(['placeholder'=>'example@example.com...']);

            ?>


        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-2"></div>
        <label for="inputEmail3" class="col-sm-2 form-control-label">ชื่อผู้ใช้งาน</label>
        <div class="col-sm-8">
            <?= $form->field($user, 'username')->label(false)->hiddenInput()->textInput(['maxlength' => true,'placeholder' => 'กรอกข้อมูลชื่อผู้ใช้งาน']) ?>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-2"></div>
        <label for="inputEmail3" class="col-sm-2 form-control-label">รหัสผ่าน</label>
        <div class="col-sm-8">
            <div class="col-sm-6">
                <?= $form->field($user, 'password')->label(false)->hiddenInput()->passwordInput(['placeholder' => 'กรอกรหัสผ่าน']) ?>

            </div>
            <div class="col-sm-6">
                <?= $form->field($user, 'confirm_password')->label(false)->hiddenInput()->passwordInput(['placeholder' => 'กรอกรหัสผ่านยืนยัน']) ?>
            </div>
        </div>
    </div>







    <div class="form-group text-center ">

        <div class="form-group">

            <?= Html::submitButton('ยืนยันการลงทะเบียน', ['class' => 'btn btn-primary btn-block btn-lg', 'name' => 'signup-button']) ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>

            <br>
            <p>* หากคุณเป็นสมาชิกอยู่แล้ว <b ><a style="color: #DF006E;" href="<?= Url::to(['site/login'])?>">เข้าสู่ระบบ</a></b></p>
</div>
    </div>
</div>
