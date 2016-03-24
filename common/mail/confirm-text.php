<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $user common\models\User */

$confirm = Yii::$app->urlManager->createAbsoluteUrl(['site/confirm', 'id'=>$user->id,'token' => $user->auth_key]);
?>

    สวัสดีคุณ <?= Html::encode($user->username) ?>

  ยืนยันการเป้นสมัครสมาชิก:
  <?= $confirm ?>
