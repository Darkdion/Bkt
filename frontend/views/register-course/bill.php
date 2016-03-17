<?php
use common\models\Registerdetail;

$details = Registerdetail::find()->where(['register_course_id' => $models->id])->all();
//var_dump($Registerdetail);
use common\models\Allfuction;
?>

<?php
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

?>

<!doctype html>
<html lang="en">
<head>

</head>
<body>


<div class="container" style="padding-left: 50px; font-size:16pt;">
    <div class="text-right" style="padding-left: 500px">
        เลขที่ใบเสร็จ &nbsp;&nbsp;<?= $models->id; ?>
        <br>
        วันที่ &nbsp;<?=thai_date(time()); ?>
    </div>
    <div style="margin-left: 300px;">

        <strong style="font-size:20pt; ">ใบแจ้งชำระเงิน</strong>
    </div>
    <div style="margin-left: 200px;">
        <strong style="font-size:22pt;  ">สถาบัญกวดวิชาบ้านครูติ๊กติวเตอร์</strong><br>
        <div style="font-size:14pt;  ">
            ที่อยู่ 209 / 9 ต.ลุ่มสุ่ม อ.ไทรโยค จ.กาญจนบุรี 71150
        </div>
    </div>


    <br>


    <strong>ชื่อ - นามสกุล </strong>&nbsp;&nbsp;<?= $models->student->fullName ?>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

    <strong>ระดับการศึกษา </strong>&nbsp;&nbsp; <?= $models->student->education ?>


    <table class=" " width="100%">
        <thead>
        <tr>
            <th class="text-center" width="10%">ลำดับ</th>
            <th class="text-center" width="60%">รายการ</th>
            <th class="text-center" width="30%">จำนวนเงิน</th>

        </tr>
        </thead>
        <tbody>
        <?php foreach ($details as $model): ?>
            <?php $SUMPrice += $model->price;
            ///คำนวน VAT
            $VAT = ($SUMPrice * 0.07);
            $SUMVAT = ($SUMPrice + $VAT)
            ?>
            <tr>
                <td class="text-center"><?= $Num++ ?></td>
                <td><?= $model->nameCourse ?></td>
                <td class="text-right"><?= number_format($model->price, 2, '.', ',') ?></td>
            </tr>

        <?php endforeach; ?>
        </tbody>
    </table>
    <table width="100%" style="  border: 1px solid black; border-top-style: none;">
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
    <br>
    <p style="font-size: 18pt;"><strong>*หมายเหตุ</strong></p>

    <ol>
        <li><strong>สามารถชำระเงินผ่าน ธนาคารกรุงไทยทุกสาขา&nbsp; &nbsp;เลขที่บัญชี x-xx-xx-xx</strong></li>
        <li><strong>ผู้ที่ลงทะเบียนเก็บใบแจ้งชำระไว้เป็นหลักฐานในการลงทะเบียน</strong></li>
        <li><strong>เมื่อชำระเสร็จแล้วสามารถแจ้งชำระและตรวจสอบสถานะผ่านทางเว็บไซต์</strong></li>
    </ol>

    <p>&nbsp; &nbsp; &nbsp;</p>


</div>

</body>
</html>
