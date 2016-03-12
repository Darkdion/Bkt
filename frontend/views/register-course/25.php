<?php
use yii\widgets\ActiveForm;

?>

<div class="panel">
    <div class="panel-body">


        <?php $f = ActiveForm::begin([
            'options' => ['name' => 'formCheckout']
        ]); ?>

        <div class="clearfix"></div>
        <h4>
            <i class="glyphicon glyphicon-shopping-cart"></i>
            รายการคอร์สเรียน
        </h4>
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th width="40px" style="text-align: right">no</th>
                <th width="100px">code</th>
                <th>ชื่อคอร์สเรียน</th>
                <th width="100px" style="text-align: right">ราคา</th>


            </tr>
            </thead>
            <tbody>


            <?php foreach ($cart as $c): ?>


                <?php
                $sumPrice += ($c['price']);
                ?>
                <tr>
                    <td style="text-align: right"><?php echo $n++; ?></td>
                    <td><?php echo $c['code']; ?></td>
                    <td><?php echo $c['name']; ?></td>
                    <td style="text-align: right">
                        <?php echo number_format($c['price']); ?>
                    </td>


                </tr>
            <?php endforeach; ?>
            </tbody>
            <tfoot>
            <tr>
                <td colspan="3"><strong>ยอดรวม</strong></td>

                <td style="text-align: right">
                    <?php echo number_format($sumPrice); ?>
                </td>
            </tr>
            </tfoot>
        </table>

        <div style="text-align: center">
            <a href="index.php?r=register-course/addshop" class="btn btn-primary btn-lg">
                <i class="glyphicon glyphicon-chevron-left"></i>
                กลับหน้าจัดการคอร์สเรียน
            </a>
            <a href="javascript:void(0)" onclick="document.formCheckout.submit()" class="btn btn-success btn-lg">
                ยืนยันการลงทะเบียน
                <i class="glyphicon glyphicon-chevron-right"></i>
            </a>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>
