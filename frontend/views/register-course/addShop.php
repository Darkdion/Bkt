<?php
use yii\web\Session;
use yii\widgets\ActiveForm;

use prawee\assets\PwAsset;

PwAsset::register($this);
$session = new Session();
$session->open();


?>
<?php foreach (Yii::$app->session->getAllFlashes() as $message):; ?>
    <?php

    echo \kartik\widgets\Growl::widget([
        'type' => (!empty($message['type'])) ? $message['type'] : 'danger',
        'title' => (!empty($message['title'])) ? \yii\bootstrap\Html::encode($message['title']) : 'Title Not Set!',
        'icon' => (!empty($message['icon'])) ? $message['icon'] : 'fa fa-info',
        'body' => (!empty($message['message'])) ? \yii\bootstrap\Html::encode($message['message']) : 'Message Not Set!',
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

<?php if(!empty($session->get('coursecart'))):?>

    <?php  $countItemsInCart = count($session->get('coursecart'));?>

    <div style="position: absolute;z-index: 1500;right: 0px;top: 80px;position: fixed;">
        <a href="index.php?r=register-course/addshop" class="btn btn-lg btn-default">
            <i class="glyphicon glyphicon-book"></i>
            รายการคอร์สเรียน
                    <span class="badge">

                      <?php echo $countItemsInCart; ?>
                    </span>
        </a>
    </div>

<?php else:?>
    <div style="position: absolute;z-index: 1500;right: 0px;top: 80px;position: fixed;">
        <a href="index.php?r=register-course/addshop" class="btn btn-lg btn-default">
            <i class="fa fa-bookmark-o"></i>
            ไม่มีรายการคอร์สเรียน
                    <span class="badge">

                         0
                    </span>
        </a>
    </div>
<?php endif; ?>
<div class="clearfix"></div>
<br>
<br>
<br>
<br>
<div class="panel">
    <div class="panel-body">
        <?php if (!empty($product)): ?>
            <h4><i class="glyphicon glyphicon-plus"></i> วิชาเรียนที่เลือก</h4>

            <?php $f = ActiveForm::begin(['options' => ['name' => 'formAddToCart']]); ?>
            <table style="margin-bottom: 50px" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th width="100px">code</th>
                    <th>ชื่อคอร์สเรียน</th>
                    <th width="100px" style="text-align: right">price</th>

                    <th width="40px">&nbsp;</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td><?php echo $product->cod_id; ?></td>
                    <td><?php echo $product->name; ?></td>
                    <td style="text-align: right">
                        <?php echo number_format($product->price); ?>
                    </td>
                    <td class=hidden>
                       <label  name="qty" value="1" style="text-align: right" ></label>
                    </td>
                    <td>
                        <a href="javascript:void(0)"
                           onclick="document.formAddToCart.submit()"
                           class="btn btn-success btn-sm">
                            <i class="glyphicon glyphicon-plus"></i>
                            ยืนยัน
                        </a>
                    </td>
                </tr>
                </tbody>
            </table>
            <?php ActiveForm::end(); ?>
        <?php endif; ?>

        <?php if(!empty($cart)): ?>
    <?php $f = ActiveForm::begin([
        'action' => 'index.php?r=register-course/checkout',
        'options' => ['name' => 'formCheckout']
    ]); ?>
        <h4>
            <i class="glyphicon glyphicon-shopping-cart"></i>
            รายการคอร์สเรียน
        </h4>
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th width="40px" style="text-align: right">no</th>
                <th width="100px">code</th>
                <th>name</th>
                <th width="100px" style="text-align: right">price</th>

                <th width="40px">&nbsp;</th>
            </tr>
            </thead>
            <tbody>


            <?php foreach ($cart as $c): ?>



                <?php
                $sumPrice += ( $c['price']);
                ?>
                <tr>
                    <td style="text-align: right"><?php echo $n++; ?></td>
                    <td><?php echo $c['code']; ?></td>
                    <td><?php echo $c['name']; ?></td>
                    <td style="text-align: right">
                        <?php echo number_format($c['price']); ?>
                    </td>

                    <td style="text-align: center">
                        <?php
                        $product_id = null;

                        if (!empty($product)) {
                            $product_id = $product->id;
                        }
                        ?>

                        <a data-confirm="ต้องการลบรายวิชาเรียนนี้ใช่หรือไม่ ?"  href="index.php?r=register-course/shopremove&index=<?php echo ($n - 2); ?>&id=<?php echo $product_id; ?>"
                           class="btn btn-danger btn-sm">
                            <i class="glyphicon glyphicon-trash" ></i>
                        </a>
                    </td>
                </tr>

            <?php endforeach; ?>
            </tbody>
            <tfoot>
            <tr>
                <td colspan="3"><strong>Total</strong></td>

                <td style="text-align: right">
                    <?php echo number_format($sumPrice); ?>
                </td>
            </tr>
            </tfoot>
        </table>


        <div style="text-align: center">
            <a href="index.php?r=register-course/index" class="btn btn-danger btn-lg  ">
                <i class="glyphicon glyphicon-chevron-left"></i>
                เลือกวิชาเรียนเพิ่ม
            </a>
            <a href="javascript:void(0)" onclick="document.formCheckout.submit()" class="btn btn-success btn-lg">
                ยืนยันการลงทะเบียน
                <i class="glyphicon glyphicon-chevron-right"></i>
            </a>
        </div>
    <?php ActiveForm::end(); ?>
    </div>
</div>
<?php else:?>
    <h2 class="text-center">ไม่พบข้อมูลวิชาเรียน</h2>
    <a href="index.php?r=register-course/index" class="btn btn-danger  ">
        <i class="glyphicon glyphicon-chevron-left"></i>
        กลับหน้าเลือกวิชาเรียน
    </a>

<?php endif; ?>