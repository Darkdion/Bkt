<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'บ้านครูติ๊กติวเตอร์',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-default navbar-fixed-top',
        ],
    ]);
    $menuItems = [
        ['label' => 'Home', 'url' => ['/site/index']],
        ['label' => 'About', 'url' => ['/site/about']],
        ['label' => 'Contact', 'url' => ['/site/contact']],
    ];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    } else {
        $menuItems[] = [
            'label' => 'คุณ ' . Yii::$app->user->identity->username .'',
            'items'=>[
                [
                    'label' => '<i class="fa fa-object-group"></i></i> จัดการข้อมูล', 'url' => ['site/users'], 'visible'=>Yii::$app->user->can('User')
                ],
                [
                    'label' => '<i class="fa fa-object-ungroup"></i> จัดการข้อมูลทั่วไป', 'url' => ['site/user'], 'visible'=>Yii::$app->user->can('Author')
                ],
                [
                    'label' => '<i class="fa fa-object-group"></i></i> จัดการข้อมูลเจ้าหน้าที่', 'url' => ['site/manager'], 'visible'=>Yii::$app->user->can('Management')
                ],
//                    ['label' => '<span class="fa fa-user"></span> โปรไฟล์ข้อมูลส่วนตัว', 'url' => ['/profile/index']],
//                    ['label' => '<i class="fa fa-wrench"></i> แก้ไขข้อมูลส่วนตัว', 'url' => ['/site/signup']],
                ['label'=>'<i class="fa fa-sign-out"></i> ออกจากระบบ','url' => ['/site/logout'],
                    'linkOptions' => ['data-method' => 'post']] ,
            ],

        ];
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'encodeLabels' => false,
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
