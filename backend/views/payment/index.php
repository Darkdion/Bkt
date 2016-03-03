<?php
?>

<div class="">

    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2><i class="fa fa-credit-card"> </i> ชำระคอร์สเรียน</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-expanded="false"><i class="fa fa-wrench"></i></a>
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

                    <section class="content invoice">
                        <!-- title row -->
                        <div class="row">
                            <div class="col-xs-12 invoice-header">
                                <h3>


                                    <small class="pull-right"> วันที่ <?= date('d/m/Y') ?></small>
                                </h3>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- info row -->

                        <div class="row">

                            <div class="text-left">


                                <?php \yii\widgets\ActiveForm::begin([
                                    'action' => 'index.php?r=payment/index',
                                    'options' => [
                                        'class' => 'form-inline',
                                        'name' => 'formpayment'
                                    ]
                                ]); ?>
                                <div class="input-group">

                                    <input type="text" name="search" class="form-control"
                                           placeholder="กรอกรหัสใบเสร็จ..."/>
                                </div>

                                <a class="btn btn-primary" onclick="document.formpayment.submit()">
                                    <i class="glyphicon glyphicon-search"></i> ค้นหา
                                </a>

                                <?php \yii\widgets\ActiveForm::end(); ?>
                            </div>

                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <!-- Table row -->
                        <div class="row">
                            <div class="col-xs-12 table">
                                <div class="table-responsive">
                                    <?php if (!empty($Regdetail & $Regcoruse)): ?>
                                    <div class="clearfix"></div>
                                    <?php foreach ($Regcoruse as $model): ?>

                                        <div>&nbsp;</div>
                                        <form class=" ">
                                            <div class="row container">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="exampleInputName2"><span class="fa fa-file"> </span>
                                                            เลขที่ใบเสร็จ: </label>
                                                    <input type="text" class="form-control" placeholder="Jane Doe"
                                                           disabled value="<?= $model->id ?>">
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="exampleInputName2"><span class="fa fa-users"> </span>
                                                            ชื่อผู้ชำระ </label>
                                                    <input type="text" class="form-control" placeholder="Jane Doe"
                                                           disabled value="<?= $model->fullName ?>">
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group text-right">



                                                      <h1> สถานะ<?= $model->status==0?' <span class="label label-danger">ยังไม่ชำระ</span>':
                                                              '<i class="label label-success"></i> <span class="label label-success">ชำระแล้ว</span>';?></h1>

                                                </div>
                                            </div>
                                            </div>
                                        </form>

                                    <?php endforeach; ?>
                                    <div>&nbsp;</div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading"><h4><i class="fa fa-amazon"></i> รายการคอร์สเรียน
                                            </h4></div>
                                        <div class="panel-body">


                                            <table
                                                class="table table-striped responsive-utilities jambo_table bulk_action">
                                                <thead>
                                                <tr>
                                                    <th>no</th>
                                                    <th class="text-left">ชื่อคอร์สเรียน</th>
                                                    <th class="text-left">ราคา</th>


                                                </tr>
                                                </thead>
                                                <tbody>

                                                <?php foreach ($Regdetail as $modeldetail): ?>

                                                    <?php
                                                    $sumPrice += ($modeldetail->price);
                                                    ?>

                                                    <tr>
                                                        <td><?= $num++ ?></td>
                                                        <td><?= $modeldetail->nameCourse ?></td>

                                                        <td><?= $modeldetail->price ?> </td>


                                                    </tr>
                                                <?php endforeach; ?>
                                                </tbody>

                                                <tfoot>
                                                <tr>
                                                    <td colspan="2"><strong>รวมทั้งหมด</strong></td>

                                                    <td style="text-align: right">
                                                        <?php echo number_format($sumPrice); ?>
                                                    </td>
                                                </tr>
                                                </tfoot>
                                            </table>
                                            <?php else: ?>


                                                <h3 class="title text-center">ไม่พบข้อมูล</h3>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                        <?php foreach($Regcoruse as $model): ?>
                        <div class="row">
                            <!-- accepted payments column -->
                            <div class="col-sm-6">

                            </div>


                            <!-- /.col -->
                            <div class="col-sm-6 ">
                                <form class="form-horizontal">
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-3 control-label"><p class="lead">
                                                ยอดรวม</p></label>
                                        <div class="col-sm-5">
                                            <div class="alert alert-success" style="font-size: 22px; text-align: right">
                                                <?php echo number_format($sumPrice, 2); ?>

                                            </div>
                                        </div>
                                    </div>

                                </form>

                                <div class="table-responsive">
                                    <div class="col-sm-5">

                                    </div>

                                </div>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <!-- this row will not appear when printing -->
                        <div class="row no-print">
                            <div class="col-xs-12">


                                <a href="index.php?r=payment/bill&id=<?php echo $model->id; ?>" class="btn btn-success btn-lg pull-right">
                                    <i class="glyphicon glyphicon-share-alt"></i>
                                    ชำระคอร์สเรียน
                                </a>


                                <button class="btn btn-dark  btn-lg pull-right" onclick="document.formpayment.submit()"
                                        type="reset" href="5555" style="margin-right: 5px;"><i
                                        class="fa fa-refresh fa-spin"> </i> ยกเลิก
                                </button>
                                <?php endforeach;?>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
$time = time();