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


                    <h1><i class="fa fa-home" style="font-size: 26px;"></i> บ้านครูติกติวเตอร์</h1>
                    <div>
                        <?= $form->field($model, 'username')->label(false)->textInput(['autofocus' => true,'placeholder'=>'ชื่อผู้ใช้งาน']) ?>
                    </div>
                    <div>
                        <?= $form->field($model, 'password')->label(false)->passwordInput(['placeholder'=>'รหัสผ่าน']) ?>
                    </div>
                    <div>
                        <?= Html::submitButton('เข้าสู่ระบบ', ['class' => 'btn btn-primary btn-block', 'name' => 'login-button']) ?>

                    </div>
                    <div class="clearfix"></div>

                <?php ActiveForm::end(); ?>
                <!-- form -->
            </section>
            <!-- content -->
        </div>

    </div>
</div>