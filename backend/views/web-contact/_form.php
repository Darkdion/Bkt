<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\WebContact */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="web-contact-form">

    <?php $form = ActiveForm::begin(); ?>
<div class="row">
    <div class="col-xs-4 col-sm-4 col-md-4">
        <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
    </div>

    <div class="col-xs-4 col-sm-4 col-md-4">
        <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    </div>

    <div class="col-xs-4 col-sm-4 col-md-4">
        <?= $form->field($model, 'phone')->widget(\yii\widgets\MaskedInput::className(),[
            'mask'=>'999-999-9999',
        ]) ?>

    </div>

</div>


    <?= $form->field($model, 'datail')->textInput(['maxlength' => true]) ?>





    <div class="form-group text-center">
        <?= Html::a('<i class="faa-pulse  wa animated fa fa-arrow-circle-left"></i> ยกเลิก', ['index'],
            ['class' => 'btn btn-danger btn-raised']) ?>
        <?= Html::submitButton($model->isNewRecord ? '<i class="fa fa-save"> </i> บันทีก' : '<i class="fa fa-pencil-square-o"> </i>ปรับปรุง', ['class' => $model->isNewRecord ? 'btn  btn-success' : 'btn  btn-primary btn-raised']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div>
