<?php
function num2string($amount)
{
    $ans = '';
    $digit = Array("หนึ่ง", "สอง", "สาม", "สี่", "ห้า", "หก", "เจ็ด", "แปด", "เก้า");
    $unit = Array("สิบ", "ร้อย", "พัน", "หมื่น", "แสน", "ล้าน");
    if ($amount == 0)
        return "ศูนย์บาทถ้วน";

    if (strpos($amount, ".") == 0)
        $amount .= ".00";

    $tmp = substr($amount, 0, strpos($amount, "."));
    while (strlen($tmp) > 6) {
        $cut = strlen($tmp) % 6;
        if ($cut == 0) $cut = 6;
        $data = substr($tmp, 0, $cut);
        for ($i = 0; $i < strlen($data) - 2; $i++) {
            if ($data[$i] == 0)
                continue;

            $ans .= $digit[$data[$i] - 1] . $unit[strlen($data) - $i - 2];
        }
        $ans .= num2string_2digit(substr($data, strlen($data) - 2)) . "ล้าน";
        $tmp = substr($tmp, $cut);
    }

    for ($i = 0; $i < strlen($tmp) - 2; $i++) {
        if ($tmp[$i] == 0)
            continue;

        $ans .= $digit[$tmp[$i] - 1] . $unit[strlen($tmp) - $i - 2];
    }

    $ans .= num2string_2digit(substr($tmp, strlen($tmp) - 2)) . "บาท";

    $tmp = substr($amount, strpos($amount, ".") + 1);
    if (substr($tmp, 0, 2) == "00")
        return $ans . "ถ้วน";

    return $ans . num2string_2digit($tmp) . "สตางค์";
}

function num2string_2digit($amount)
{
    $digit = Array("ศูนย์", "หนึ่ง", "สอง", "สาม", "สี่", "ห้า", "หก", "เจ็ด", "แปด", "เก้า");

    $ans = "";
    $amount = sprintf("%d", $amount);

    if (strlen($amount) == 1)
        return $digit[$amount];

    if ($amount[0] == 2)
        $ans .= "ยี่";
    else if ($amount[0] > 2)
        $ans .= $digit[$amount[0]];

    if ($amount[0] > 0)
        $ans .= "สิบ";

    if ($amount[1] > 1)
        $ans .= $digit[$amount[1]];
    else if ($amount[1] == 1)
        $ans .= "เอ็ด";

    return $ans;
}
function thai_date($time)
{
    global $thai_day_arr, $thai_month_arr;
    // $thai_date_return=" ".$thai_day_arr=array("อาทิตย์","จันทร์","อังคาร","พุธ","พฤหัสบดี","ศุกร์","เสาร์")[date("w",$time)];
    $thai_date_return = "" . date("j", $time);
    $thai_date_return .= " " . $thai_month_arr = array(
            " ","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค."
        )[date("n", $time)];
    $thai_date_return .= "" . (date("Y", $time) + 543);
    //$thai_date_return .= " เวลา" . date("H:i", $time) . " น.";
    return $thai_date_return;
}
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


                                    <small class="pull-right"> วันที่ <?= thai_date(time()) ?></small>
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

                                                    <?php $SUMPrice += $modeldetail->price;
                                                    ///คำนวน VAT
                                                    $VAT = ($SUMPrice * 0.07);
                                                    $SUMVAT = ($SUMPrice + $VAT)
                                                    ?>

                                                    <tr>
                                                        <td><?= $num++ ?></td>
                                                        <td><?= $modeldetail->nameCourse ?></td>

                                                        <td><?= $modeldetail->price ?> </td>


                                                    </tr>
                                                <?php endforeach; ?>
                                                </tbody>


                                            </table>
                                            <table width="100%" class="table">
                                                <tr>
                                                    <td class="text-center" width="60%" rowspan="3" style="font-size: 18pt" colspan="3">
                                                        <b><?= num2string($SUMVAT) ?></b></td>

                                                    <td width="20%" class="text-center">ราคารวม</td>
                                                    <td width="20%" class="text-right"><?= number_format($SUMPrice, 2, '.', ',') ?></td>

                                                </tr>
                                                <tr>
                                                    <td width="20%" class="text-center">VAT 7%</td>
                                                    <td width="20%" class="text-right"><?= number_format($VAT, 2, '.', ',') ?></td>

                                                </tr>
                                                <tr>

                                                    <td width="20%" class="text-center"><b>ยอดสุทธิ </b></td>
                                                    <td width="20%" class="text-right"><b><?= number_format($SUMVAT, 2, '.', ',') ?></b></td>

                                                </tr>
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
                                                <?= number_format($SUMVAT, 2, '.', ',') ?>

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


                                <a target="_blank" href="index.php?r=payment/bill&id=<?php echo $model->id; ?>" class="btn btn-success btn-lg pull-right">
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


