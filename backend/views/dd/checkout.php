<?php
use yii\widgets\ActiveForm;
?>

    <div class="x_panel">
        <div class="x_title">

            <h2>  <i class="faa-shake animated fa fa-gavel "></i> ยืนยันการสั่งซื้อ </h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Settings 1</a>
                        </li>
                        <li><a href="#">Settings 2</a>
                        </li>
                    </ul>
                </li>
                <li><a class="close-link"><i class="fa fa-close"></i></a>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">


<?php $f = ActiveForm::begin([
    'options' => ['name' => 'formCheckout']
]); ?>
            <div class="item form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="occupation">ชื่อสมาชิก <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <?= $f->field($register_course, 'student_id')->label(false)->widget(\kartik\select2\Select2::className(),[
                        'data'=>\yii\helpers\ArrayHelper::map(\common\models\Student::find()->all(),'id','fullName'),
                        'language'=>'th',
                        'options'=>['placeholder'=>'เลือก'],
                        'pluginOptions'=>[
                            'allowClear'=>true
                        ],
                    ])?>

                </div>
            </div>
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
                <a href="index.php?r=course-register/addtocart" class="btn btn-primary btn-lg">
                    <i class="glyphicon glyphicon-chevron-left"></i>
                    Cart Management
                </a>
                <a href="javascript:void(0)" onclick="document.formCheckout.submit()" class="btn btn-success btn-lg">
                    Checkout Now
                    <i class="glyphicon glyphicon-chevron-right"></i>
                </a>
            </div>
<?php ActiveForm::end(); ?>
        </div>
    </div>
