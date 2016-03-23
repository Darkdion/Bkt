<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'เข้าสู่ระบบ';
$this->params['breadcrumbs'][] = $this->title;


?>
<link href="semari/semantic.css" rel="stylesheet"/>
<style>
    body {
        background-color: #f5f5f5;
    }


</style>
<br>
<div class="container" >
    <div class="panel">

        <div class="panel-body ">
    <div class="row">
        <div class="col-md-4"></div>

        <div class="col-md-4">

            <br>



                    <br>


                    <?php $form = ActiveForm::begin(['id' => 'login-form',

                        'class' => 'form-signin'
                    ]); ?>

                    <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                    <?= $form->field($model, 'password')->passwordInput() ?>

                    <?= $form->field($model, 'rememberMe')->checkbox() ?>
                    <div class="form-group text-center">
                    <div class=" ui animated  buttons">

                        <?= Html::submitButton(' <i class="fa fa-sign-in"></i> เข้าสู่ระบบ', ['class' => 'ui primary button', 'name' => 'login-button']) ?>
                        <div class="or"></div>
                        <button class="ui positive button">สมัครสมาชิก</button>
                    </div>
                    </div>
                    <?php ActiveForm::end(); ?>

        </div>
        <div class="col-md-4"></div>
    </div>
        </div>
    </div>
</div>
