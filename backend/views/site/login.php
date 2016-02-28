<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
Yii::$app->layout='layoutlogin';
$this->title = 'สถาบันกวดวิชา';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="">
    <a class="hiddenanchor" id="toregister"></a>
    <a class="hiddenanchor" id="tologin"></a>

    <div id="wrapper">
        <div id="login" class="animate form">
            <section class="login_content">
                <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
                    <h1>Login Form</h1>
                    <div>
                        <?= $form->field($model, 'username')->textInput(['autofocus' => true,'placeholder'=>'กรอก']) ?>
                    </div>
                    <div>
                        <?= $form->field($model, 'password')->passwordInput() ?>
                    </div>
                    <div>
                        <?= Html::submitButton('เข้าสู่ระบบ', ['class' => 'btn btn-primary btn-block', 'name' => 'login-button']) ?>
                        <a class="reset_pass" href="#">Lost your password?</a>
                    </div>
                    <div class="clearfix"></div>
                    <div class="separator">

                        <p class="change_link">New to site?
                            <a href="#toregister" class="to_register"> Create Account </a>
                        </p>
                        <div class="clearfix"></div>
                        <br />
                        <div>
                            <h1><i class="fa fa-paw" style="font-size: 26px;"></i> Gentelella Alela!</h1>

                            <p>©2015 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
                        </div>
                    </div>
                <?php ActiveForm::end(); ?>
                <!-- form -->
            </section>
            <!-- content -->
        </div>

    </div>
</div>