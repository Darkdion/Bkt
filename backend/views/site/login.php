<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
Yii::$app->layout='layoutlogin';
$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>


<section class="section-account">
    <div class="img-backdrop" style="background-image: url('themes/assets/img/img16.jpg')"></div>
    <div class="spacer"></div>
    <div class="card contain-sm style-transparent">

        <div class="card">
            <div class="card-body">

            <div class="row">
                <div class= "col-sm-3"></div>
                <div class="col-sm-6">
                    <br/>
                    <span class="text-lg text-bold text-primary"> <i class="fa  fa-spin md md-settings"></i> จัดการโรงเรียนกวดวิชาบ้านครูติ๊กติเตอร์</span>
                    <br/><br/>
                    <?php $form = ActiveForm::begin(['id' => 'login-form',
                        'options'=>['form floating-label']

                    ]); ?>
                    <label for="loginform-username">ชื่อผู้ใช้งาน </label>
                    <?= $form->field($model, 'username')->textInput()->label(false)?>
                    <label for="loginform-username">รหัสผ่าน </label>
                    <?= $form->field($model, 'password')->passwordInput()->label(false) ?>
                    <div class="checkbox  ">

                        <?= $form->field($model, 'rememberMe')->checkbox() ?>
                    </div>


                    <div class="form-group">
                        <?= Html::submitButton('เข้าสู่ระบบ', ['class' => 'btn btn-block btn-raised btn-primary', 'name' => 'login-button']) ?>
                    </div>

                    <?php ActiveForm::end(); ?>

                </div><!--end .col -->

            </div>
            </div><!--end .row -->
        </div><!--end .card-body -->
    </div><!--end .card -->
</section>
