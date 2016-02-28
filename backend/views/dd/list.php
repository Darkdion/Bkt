<?php
use yii\helpers\Html;
use yii\widgets\ListView;
use yii\widgets\Menu;

/* @var $this yii\web\View */


?>


<div class="container-fluid">
    <div class="row">
        <div class="col-xs-4">
<!--            --><?//= Menu::widget([
//                'items' => $menuItems,
//                'options' => [
//                    'class' => 'menu',
//                ],
//            ]) ?>
        </div>
        <div class="col-xs-8">
            <?= ListView::widget([
                'courseDataProvider' => $courseDataProvider,
                'itemView' => '_item',
            ]) ?>
        </div>
    </div>
</div>