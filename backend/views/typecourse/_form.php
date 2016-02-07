<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Typecourse */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="typecourse-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>


    <div class="form-group text-center">
        <button type="button" class="btn btn-default btn-raised" data-dismiss="modal"> <i class="faa-pulse  wa animated fa fa-ban"></i> ยกเลิก</button>

        <?= Html::submitButton($model->isNewRecord ? '<i class=" faa-shake animated fa  fa-save"> </i> บันทีก' : '<i class="faa-shake animated fa fa-pencil-square-o"> </i>ปรับปรุง', ['class' => $model->isNewRecord ? 'btn  btn-success' : 'btn  btn-primary btn-raised']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
