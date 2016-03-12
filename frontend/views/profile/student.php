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
$this->title = 'ข้อมูลส่วนตัว';
//$this->params['breadcrumbs'][] = ['label' => 'ข้อมูลส่วนตัว', 'url' => ['index']];

?>

<div class="user-form">


    <?php $form = ActiveForm::begin([


    ]) ?>
    <div class="panel panel-body box">
        <h1 class="text-center"><?= Html::encode($this->title) ?></h1>

    <div class="form-group row">
        <div class="col-sm-2"></div>
        <label for="inputEmail3" class="col-sm-2 form-control-label">คำนำหน้า</label>
        <div class="col-sm-8">
            <?= $form->field($model2, 'title')->label(false)->radioList($model2->getItemTitle(),
                ['prompt' => 'เลือกคำนำหน้า..']
            ) ?>

        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-2"></div>
        <label for="inputEmail3" class="col-sm-2 form-control-label">ชื่อ-นามสกุล</label>
        <div class="col-sm-4">
            <?= $form->field($model2, 'firstname')->label(false)->textInput(['placeholder' => 'กรอกชื่อ',]) ?>

        </div>
        <div class="col-sm-4">
            <?= $form->field($model2, 'lastname')->label(false)->textInput(['placeholder' => 'กรอกนามสกุล',]) ?>

        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-2"></div>
        <label for="inputEmail3" class="col-sm-2 form-control-label">เพศ</label>
        <div class="col-sm-8">

            <?= $form->field($model2, 'sex')->label(false)->radioList($model2->getItemSex()) ?>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-2"></div>
        <label for="inputEmail3" class="col-sm-2 form-control-label">เลขบัตรประชาชน</label>
        <div class="col-sm-8">

            <?= $form->field($model2, 'identification')->label(false)->hiddenInput()->widget(\yii\widgets\MaskedInput::classname(), [
                'mask' => '9-9999-99999-99-9',
                'clientOptions' => [
                    'removeMaskOnSubmit' => true //กรณีไม่ต้องการให้มันบันทึก format ลงไปด้วยเช่น 9-9999-99999-999 ก็จะเป็น 9999999999999
                ],
                'options' => ['class' => 'form-control',
                    'placeholder' => 'เลขบัตรประชาชน',
                    'disabled'=>true
                ]
            ]) ?>

        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-2"></div>
        <label for="inputEmail3" class="col-sm-2 form-control-label">วันเกิด</label>
        <div class="col-sm-4">


            <?= dosamigos\datepicker\DatePicker::widget([
                'model' => $model2,
                'attribute' => 'birthday',
                'language' => 'th',
                'template' => '{addon}{input}',
                'clientOptions' => [
                    'autoclose' => true,
                    'format' => 'yyyy/m/d'
                ]
            ]); ?>


        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-2"></div>
        <label for="inputEmail3" class="col-sm-2 form-control-label">ระดับการศึกษา</label>
        <div class="col-sm-4">

            <?= $form->field($model2, 'education')->label(false)->dropDownList($model2->getItemEducation()
                , [
                    'prompt' => 'เลือกระดับการศึกษา'
                ]) ?>
        </div>

    </div>
    <div class="form-group row">
        <div class="col-sm-2"></div>
        <label for="inputEmail3" class="col-sm-2 form-control-label">สถานศึกษา</label>
        <div class="col-sm-4">

            <?= $form->field($model2, 'school_id')->label(false)->dropDownList(ArrayHelper::map(\common\models\School::find()->all(), 'id', 'name'),
                ['prompt' => 'เลือกโรงเรียน']) ?>
        </div>


    </div>
    <div class="form-group row">
        <div class="col-sm-2"></div>
        <label for="inputEmail3" class="col-sm-2 form-control-label">บ้านเลขที่, ถนน, หมู่บ้าน</label>
        <div class="col-sm-8">

            <?= $form->field($model2, 'address')->label(false)->textarea(['rows' => 3]) ?>


        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-2"></div>
        <label for="inputEmail3" class="col-sm-2 form-control-label">จังหวัด,อำเภอ,ตำบล</label>
        <div class="col-sm-8">


            <div class="col-sm-4 ">
                <?= $form->field($model2, 'province')->label(false)->dropdownList(
                    ArrayHelper::map(Province::find()->all(),
                        'PROVINCE_ID',
                        'PROVINCE_NAME'),
                    [
                        'id' => 'ddl-province',
                        'prompt' => 'เลือกจังหวัด'
                    ]); ?>
            </div>
            <div class="col-sm-4 ">
                <?= $form->field($model2, 'amphur')->label(false)->widget(DepDrop::classname(), [
                    'options' => ['id' => 'ddl-amphur'],
                    'data' => $amphur,
                    'pluginOptions' => [
                        'depends' => ['ddl-province'],
                        'placeholder' => 'เลือกอำเภอ...',
                        'url' => Url::to(['/student/get-amphur'])
                    ]
                ]); ?>
            </div>
            <div class="col-sm-4 ">
                <?= $form->field($model2, 'district')->label(false)->widget(DepDrop::classname(), [
                    'data' => $district,
                    'pluginOptions' => [
                        'depends' => ['ddl-province', 'ddl-amphur'],
                        'placeholder' => 'เลือกตำบล...',
                        'url' => Url::to(['/student/get-district'])
                    ]
                ]); ?>
            </div>

        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-2"></div>
        <label for="inputEmail3" class="col-sm-2 form-control-label">เบอร์โทร</label>
        <div class="col-sm-8">

            <?= $form->field($model2, 'phone')->label(false)->hiddenInput()->widget(\yii\widgets\MaskedInput::className(), [
                'mask' => '999-999-9999',

                'clientOptions' => [
                    'removeMaskOnSubmit' => true //กรณีไม่ต้องการให้มันบันทึก format ลงไปด้วยเช่น 9-9999-99999-999 ก็จะเป็น 9999999999999
                ],
                'options' => ['class' => 'form-control',
                    'placeholder' => 'โทรศัพท์มือถือ',
                ]
            ]) ?>


        </div>
    </div>


    <div class="form-group text-center ">
        <?= Html::a('<i class="faa-pulse  wa animated fa fa-arrow-circle-left"></i> ยกเลิก', ['index'],
            ['class' => 'btn btn-danger btn-lg']) ?>
        <?= Html::submitButton($model2->isNewRecord ? '<i class="faa-wrench animated fa fa-save"> </i> บันทีก' : '<i class="faa-wrench animated fa fa-pencil-square-o"> </i>บันทึกการแก้ไข', ['class' => $model2->isNewRecord ? 'btn  btn-success btn-lg' : 'btn  btn-primary btn-lg']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
</div>