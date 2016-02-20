<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use kartik\widgets\Growl;

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
<body class="menubar-hoverable header-fixed ">
<?php $this->beginBody() ?>
<?=$this->render('header') ?>
<div class="wrap">
  <div id="base">

    <div class="offcanvas">
  			</div><!--end .offcanvas-->
      <div id="content">

          <!-- BEGIN LIST SAMPLES -->
          <section>
              <div class="container">
                  <?= Breadcrumbs::widget([
                      'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                  ]) ?>
                  <?php foreach (Yii::$app->session->getAllFlashes() as $message):; ?>
                  <?php

                  echo Growl::widget([
                      'type' => (!empty($message['type'])) ? $message['type'] : 'danger',
                      'title' => (!empty($message['title'])) ? Html::encode($message['title']) : 'Title Not Set!',
                      'icon' => (!empty($message['icon'])) ? $message['icon'] : 'fa fa-info',
                      'body' => (!empty($message['message'])) ? Html::encode($message['message']) : 'Message Not Set!',
                      'showSeparator' => true,
                      'delay' => 1, //This delay is how long before the message shows
                      'pluginOptions' => [
                          'delay' => (!empty($message['duration'])) ? $message['duration'] : 3000, //This delay is how long the message shows for
                          'placement' => [
                              'from' => (!empty($message['positonY'])) ? $message['positonY'] : 'top',
                              'align' => (!empty($message['positonX'])) ? $message['positonX'] : 'right',
                          ]
                      ]
                  ]);
                  ?>
                  <?php endforeach; ?>
                  <?= $content ?>
              </div>
          </section>
      </div><!--end #content-->

      <?=$this->render('menuleft') ?>

  </div><!--end #base-->

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
