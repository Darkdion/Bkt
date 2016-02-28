<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


use yii\helpers\ArrayHelper;
use common\models\Amphur;
use common\models\Province;
use common\models\District;
use yii\helpers\Url;
use kartik\widgets\DepDrop;
?>

<div class="teacher-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="form-group row">
        <div class="col-sm-2"></div>
        <label for="inputEmail3" class="col-sm-2 form-control-label">คำนำหน้า</label>
        <div class="col-sm-8">
            <?= $form->field($model, 'title')->dropDownList($model->getItemTitle(),
                ['prompt' => 'เลือกคำนำหน้า..']
            ) ?>
            </div>
        </div>

    <div class="form-group row">
        <div class="col-sm-2"></div>
        <label for="inputEmail3" class="col-sm-2 form-control-label">ชื่อ-นามสกุล</label>
        <div class="col-sm-4">
            <?= $form->field($model, 'name')->textInput(['maxlength' => 50]) ?>
        </div>
        <div class="col-sm-4">
            <?= $form->field($model, 'surname')->textInput(['maxlength' => 50]) ?>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-2"></div>
        <label for="inputEmail3" class="col-sm-2 form-control-label">เพศ</label>
        <div class="col-sm-8">
            <?= $form->field($model, 'sex')->radioList($model->getItemSex()) ?>
        </div>

    </div>
    <div class="form-group row">
        <div class="col-sm-2"></div>
        <label for="inputEmail3" class="col-sm-2 form-control-label">วันเกิด</label>
        <div class="col-sm-8">

            <?= dosamigos\datepicker\DatePicker::widget([
                'model' => $model,
                'attribute' => 'birthday',
                'language' => 'th',
                'template' => '{addon}{input}',
                'clientOptions' => [
                    'autoclose' => true,
                    'format' => 'yyyy/m/d'
                ]
            ]);?>

        </div>

    </div>
    <div class="form-group row">
        <div class="col-sm-2"></div>
        <label for="inputEmail3" class="col-sm-2 form-control-label">เลขบัตรประชาชน</label>
        <div class="col-sm-4">

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
        <div class="col-sm-4">
            <?= $form->field($model, 'age')->textInput() ?>
        </div>

    </div>
    <div class="form-group row">
        <div class="col-sm-2"></div>
        <label for="inputEmail3" class="col-sm-2 form-control-label">ที่อยู่</label>
        <div class="col-sm-4">

            <?= $form->field($model, 'address')->textarea(['rows' => 3]) ?>

        </div>
        <div class="col-sm-4">
            <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>
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
                        'url'=>Url::to(['/student/get-amphur'])
                    ]
                ]); ?>
            </div>
            <div class="col-sm-4 ">
                <?= $form->field($model, 'district')->label(false)->widget(DepDrop::classname(), [
                    'data' =>$district,
                    'pluginOptions'=>[
                        'depends'=>['ddl-province', 'ddl-amphur'],
                        'placeholder'=>'เลือกตำบล...',
                        'url'=>Url::to(['/student/get-district'])
                    ]
                ]); ?>
            </div>

        </div>
    </div>



    <div class="form-group row">
        <div class="col-sm-2"></div>
        <label for="inputEmail3" class="col-sm-2 form-control-label">ที่อยู่</label>
        <div class="col-sm-4">

            <?= $form->field($model, 'experience')->textarea(['rows' => 3]) ?>
        </div>

    </div>










    <div class="form-group text-center ">
        <?= Html::a('<i class="faa-pulse  wa animated fa fa-arrow-circle-left"></i> ยกเลิก', ['index'],
            ['class' => 'btn btn-danger btn-lg']) ?>
        <?= Html::submitButton($model->isNewRecord ? '<i class="faa-wrench animated fa fa-save"> </i> บันทีก' : '<i class="faa-wrench animated fa fa-pencil-square-o"> </i>ปรับปรุง', ['class' => $model->isNewRecord ? 'btn  btn-success btn-lg' : 'btn  btn-primary btn-lg']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
