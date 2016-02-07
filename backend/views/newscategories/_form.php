<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Newscategories */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="newscategories-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>



    <div class="form-group  text-center">
        <?= Html::a('<i class="faa-pulse  wa animated fa fa-arrow-circle-left"></i> ยกเลิก', ['index'],
            ['class' => 'btn btn-danger btn-raised']) ?>
        <?= Html::submitButton($model->isNewRecord ? '<i class="fa fa-save"> </i> บันทีก' : '<i class="fa fa-pencil-square-o"> </i>ปรับปรุง', ['class' => $model->isNewRecord ? 'btn  btn-success' : 'btn  btn-primary btn-raised']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
