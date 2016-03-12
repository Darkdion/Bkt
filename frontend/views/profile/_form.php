<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<div class="user-form">


    <div class="panel panel-body box" >
        <h1 class="text-center"><?= Html::encode($this->title) ?></h1>


            <?php $form = ActiveForm::begin([
                'options' => ['enctype' => 'multipart/form-data']
            ]); ?>


                <div class="row">

                    <div class="col-lg-6 ">
                        <?= $form->field($model, 'username')->textInput(['maxlength' => true])->label('ชื่อผู้ใช้งาน') ?>
                    </div>
                    <div class="col-lg-6">
                        <?= $form->field($model, 'email')->textInput(['maxlength' => true])->label('อีเมล์') ?>
                    </div>
                    <div>

                        <div class="col-lg-6">
                            <?= $form->field($model, 'password')->passwordInput(['maxlength' => true])->label('รหัสผ่าน') ?>
                        </div>
                        <div class="col-lg-6">
                            <?= $form->field($model, 'confirm_password')->passwordInput(['maxlength' => true])->label('ยืนยันรหัสผ่าน') ?>
                        </div>



                        <div class="form-group text-center ">
                            <?= Html::a('<i class="faa-pulse  wa animated fa fa-arrow-circle-left"></i> ยกเลิก', ['index'],
                                ['class' => 'btn btn-danger btn-lg']) ?>
                            <?= Html::submitButton($model->isNewRecord ? '<i class="faa-wrench animated fa fa-save"> </i> บันทีก' : '<i class="faa-wrench animated fa fa-pencil-square-o"> </i>บันทึกการแก้ไข', ['class' => $model->isNewRecord ? 'btn  btn-success btn-lg' : 'btn  btn-primary btn-lg']) ?>
                        </div>

                        <?php ActiveForm::end(); ?>

                    </div>
