<?php
use yii\web\Session;
use yii\widgets\ActiveForm;

$session = new Session();
$session->open();


?>


<div style="position: absolute;z-index: 1500;right: 0px;top: 80px;position: fixed;">
    <a href="index.php?r=course-register/addtocart" class="btn btn-lg btn-default">
        <i class="glyphicon glyphicon-book"></i>
        รายการคอร์สเรียน
                    <span class="badge">
                      <?php
                      $countItemsInCart = 0;

                      if (!empty($session->get('coursecart'))) {
                          $countItemsInCart = count($session->get('coursecart'));
                      }
                      ?>
                      <?php echo $countItemsInCart; ?>
                    </span>
    </a>
</div>
<div class="clearfix"></div>
<br>
<br>
<br>
<br>
<div class="panel">
    <div class="panel-body">
        <?php if (!empty($product)): ?>
            <h4><i class="glyphicon glyphicon-plus"></i> วิชาเรียนทที่เลือก</h4>

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
                        <a href="index.php?r=course-register/cartremove&index=<?php echo ($n - 2); ?>&id=<?php echo $product_id; ?>"
                           class="btn btn-danger btn-sm">
                            <i class="glyphicon glyphicon-trash"></i>
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
            <a href="index.php?r=course-register/index" class="btn btn-danger btn-lg  ">
                <i class="glyphicon glyphicon-chevron-left"></i>
                เลือกวิชาเรียนเพิ่ม
            </a>
            <a href="index.php?r=course-register/checkout" class="btn btn-success btn-lg">
               ยืนยันการสั่งซื้อ
                <i class="glyphicon glyphicon-chevron-right"></i>
            </a>
        </div>
    </div>
</div>
