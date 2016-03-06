<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;
Yii::$app->layout='error';
$this->title = $name;
?>


<div class="container body">

    <br>
    <div class="main_container">

        <!-- page content -->
        <div class="col-md-12">
            <div class="col-middle">
                <div class="text-center text-center">
                    <h1 class="error-number"><?= Html::encode($this->title) ?></h1>
                    <div class="alert alert-danger">
                        <h3>
                        <?= nl2br(Html::encode($message)) ?>
                        </h3>
                    </div>

                    <div class="mid_center">
                        <a href="" class="btn btn-default btn-lg">ติดต่อเจ้าของสถาบัน...</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->

    </div>
    <!-- footer content -->
</div>
