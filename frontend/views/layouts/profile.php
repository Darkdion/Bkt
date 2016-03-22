<?php
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;

 ?>
<?php $this->beginContent('@frontend/views/layouts/user/main2.php'); ?>
<div class="panel panel-body">
<?php
echo Nav::widget([
    'items' => [
        [
            'label' => 'โปรไฟล์',
            'url' => ['profile/index'],
        ],
        [
            'label' => 'แก้ไขข้อมูลส่วนตัว',
            'url' => ['profile/student'],
        ],
        [
            'label' => 'แก้ไขข้อมูลผู้ใช้งาน',
            'url' => ['profile/update'],
        ],

    ],
    'options' => ['class' =>'nav nav-tabs  nav-pills'], // set this to nav-tab to get tab-styled navigation
]);
 ?>
</div>

<div style="padding:px;">

  <?php echo $content; ?>
</div>



<?php $this->endContent(); ?>
