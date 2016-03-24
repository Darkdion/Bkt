<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $user common\models\User */

$confirm = Yii::$app->urlManager->createAbsoluteUrl(['site/confirm', 'id'=>$user->id,'token' => $user->auth_key]);
?>
<div class="password-reset">
    <p>สวัสดีคุณ <?= Html::encode($user->username) ?>,</p>

    <p>ยืนยันการเป้นสมัครสมาชิก:</p>

    <p><?= Html::a(Html::encode($confirm), $confirm) ?></p>
</div>
