<?php
function thai_date($time){
    global $thai_day_arr,$thai_month_arr;
    //$thai_date_return="วัน ".$thai_day_arr=array("อาทิตย์","จันทร์","อังคาร","พุธ","พฤหัสบดี","ศุกร์","เสาร์")[date("w",$time)];
    $thai_date_return= "".date("j",$time);
    $thai_date_return.=" ".$thai_month_arr=array(
            "","ม.ค.","ก.พ.","มี.ค.","เมษายน", "พฤษภาคม",
            "มิถุนายน", "กรกฎาคม", "สิงหาคม","กันยายน", "ตุลาคม",
            "พฤศจิกายน", "ธันวาคม"
        )[date("n",$time)];
    $thai_date_return.= " ".(date("Y",$time)+543);
    //  $thai_date_return.= "  ".date("H:i",$time)." น.";
    return $thai_date_return;
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<div class="container" style="padding-left: 50px; font-size:15pt;">
    <div style="padding-left:500px;margin-top: 10px"> เลขที่ใบเสร็จ &nbsp;&nbsp;
        <?= $model->id; ?></div>
    <div style="padding-left:500px;">
        <?= thai_date(time()); ?></div>
    <div class="row">
        <div class="col-md-4">
            <div align="center" style="margin-bottom: 5px">
                <strong style="font-size:22pt;  "><u>ใบเสร็จรับเงิน</u></strong>
            </div>
        </div>

        <div class="col-md-4">


        </div>
        <br>
        <div class="text-center">
            <strong style="font-size:20pt;  ">สถาบันกวดวิชาบ้านครูติ๊กติวเตอร์</strong>
        </div>

    </div>

    <div style="font-size: 20px;">
        ได้รับเงินจาก&nbsp; <b style="font-weight:bold;"><?= $model->fullName ?></b>
    </div>
    <br>
    <table border="1" cellspacing="0" width="100%" style="font-size: 18px">
        <thead>
        <tr>
            <td width="10%"  style="font-size: 22px" align="center">#</td>
            <td width="70%" style="font-size: 22px" class="text-center"><strong>รายการคอร์สเรียน</strong></td>

            <td width="20%" style="font-size: 22px" class="text-center"><strong>ราคา</strong></td>

        </tr>
        </thead>
        <tbody>
        <?php $no = 1; ?>
        <!--            ลูปข้อมูล -->
        <?php foreach (\common\models\RegisterCourse::find()->where(['id' => $model->id])->all() as $row): ?>


            <?php foreach (\common\models\Registerdetail::find()->where(['register_course_id' => $modeldetail->id])->all() as $course): ?>
                <?php $sumtotall += $course->price ?>
                <tr>
                    <td width="10%"  style="font-size: 20px" align="center"><?= $no++; ?></td>

                    <td width="70%" style="font-size: 20px"><?= $course->nameCourse; ?></td>
                    <td width="20%" style=" font-size: 20px" align="center"><?= number_format($course->price, 2, '.', '') ; ?></td>


                </tr>
            <?php endforeach; ?>
        <?php endforeach; ?>


        </tbody>
<!--        <tfoot>-->
<!--        <tr>-->
<!--<!--            <td   style="font-size: 22px; font-weight:bold;">-->-->
<!--<!--                รวมจำนวนเงิน (ตัวอักษร)-->-->
<!--<!--               -->--><?php ////echo convert($sumtotall . '.00'); ?>
<!--<!---->-->
<!--<!--            </td>-->-->
<!--            <td  style="font-size: 20px; font-weight:bold; "></td>-->
<!--            <td  style="font-size: 22px; font-weight:bold;">--><?php //echo number_format($sumtotall) . '.00' ?><!-- </td>-->
<!--        </tr>-->
<!---->
<!--        </tfoot>-->
    </table>

 <table width="100%"  style=" border: 1px solid black;
        border-top-style: none;" cellspacing="0" >
     <tr>

         <td style=" border: 1px solid black;border-top-style: none;  font-size: 22px" width="60%" align="center"><b><?php echo convert($sumtotall . '.00'); ?></b></td>
         <td style="border: 1px solid black;border-top-style: none;" width="40%">
             <table width="100%" style="border: 1px solid black;border-top-style: none;
             border-bottom-style: none;border-left-style: none;border-right-style: none;" cellspacing="0">
                 <tr>
                     <td width="47%" style="border: 2px solid black;border-top-style: none;border-left-style: none;border-right-style: none; font-size: 20px">ราคารวม</td>
                     <td width="53%" align="center" style="border: 2px solid black;border-top-style: none;border-right-style: none;font-size: 20px"><?php echo number_format($sumtotall, 2, '.', '')  ?></td>
                 </tr>
                 <tr>
                     <td width="47%" style="border: 2px solid black;border-top-style: none;border-left-style: none;border-right-style: none; font-size: 20px">VAT 7%</td>
                     <td width="53%" style="border: 2px solid black;border-top-style: none;border-right-style: none;font-size: 20px" align="center">
                         <?php $vat =($sumtotall*0.07);  echo number_format($vat, 2, '.', ''); ?>
                     </td>
                 </tr>
                 <tr>
                     <td width="47%" style="border: 2px solid black;border-top-style: none;border-bottom-style: none;border-left-style: none;border-right-style: none;  font-size: 22px">รวมทั้งสิ้น</td>
                     <td width="53%" style="border: 2px solid black;border-top-style: none;border-bottom-style: none;border-right-style: none;font-size: 20px" align="center">
                         <b><?php $sumvat =($sumtotall+$vat);  echo number_format($sumvat, 2, '.', '')?></b>
                     </td>
                 </tr>
             </table>

          </td>


     </tr>

 </table>
    <br>
    <table class="table" style="font-size:15pt;">
        <?php


        $per = \common\models\Personnel::find()->where(['user_id' => Yii::$app->user->id])->all();


        ?>
        <?php foreach ($per as $pers): ?>


            <tr>
                <td style="padding-left:100px;  "></td>
                <td style="padding-left:350px;font-weight:bold; ">ลงชื่อ ..... <?= $pers->nameDot ?>......ผู้รับเงิน
                </td>
            </tr>
            <tr>
                <td style="padding-left: 100px;"></td>
                <td style="padding-left:350px; font-weight:bold;  ">  &nbsp;&nbsp;
                    &nbsp;&nbsp; ( <?= $pers->fullName ?>)
                </td>

            </tr>
        <?php endforeach; ?>
    </table>


    <br><br>


</div>

</body>
</html>

<?PHP
function convert($number)
{
    $txtnum1 = array('ศูนย์', 'หนึ่ง', 'สอง', 'สาม', 'สี่', 'ห้า', 'หก', 'เจ็ด', 'แปด', 'เก้า', 'สิบ');
    $txtnum2 = array('', 'สิบ', 'ร้อย', 'พัน', 'หมื่น', 'แสน', 'ล้าน', 'สิบ', 'ร้อย', 'พัน', 'หมื่น', 'แสน', 'ล้าน');
    $number = str_replace(",", "", $number);
    $number = str_replace(" ", "", $number);
    $number = str_replace("บาท", "", $number);
    $number = explode(".", $number);
    if (sizeof($number) > 2) {
        return 'ทศนิยมหลายตัวนะจ๊ะ';
        exit;
    }
    $strlen = strlen($number[0]);
    $convert = '';
    for ($i = 0; $i < $strlen; $i++) {
        $n = substr($number[0], $i, 1);
        if ($n != 0) {
            if ($i == ($strlen - 1) AND $n == 1) {
                $convert .= 'เอ็ด';
            } elseif ($i == ($strlen - 2) AND $n == 2) {
                $convert .= 'ยี่';
            } elseif ($i == ($strlen - 2) AND $n == 1) {
                $convert .= '';
            } else {
                $convert .= $txtnum1[$n];
            }
            $convert .= $txtnum2[$strlen - $i - 1];
        }
    }

    $convert .= 'บาท';
    if ($number[1] == '0' OR $number[1] == '00' OR
        $number[1] == ''
    ) {
        $convert .= 'ถ้วน';
    } else {
        $strlen = strlen($number[1]);
        for ($i = 0; $i < $strlen; $i++) {
            $n = substr($number[1], $i, 1);
            if ($n != 0) {
                if ($i == ($strlen - 1) AND $n == 1) {
                    $convert
                        .= 'เอ็ด';
                } elseif ($i == ($strlen - 2) AND
                    $n == 2
                ) {
                    $convert .= 'ยี่';
                } elseif ($i == ($strlen - 2) AND
                    $n == 1
                ) {
                    $convert .= '';
                } else {
                    $convert .= $txtnum1[$n];
                }
                $convert .= $txtnum2[$strlen - $i - 1];
            }
        }
        $convert .= 'สตางค์';
    }
    return $convert;
}

## วิธีใช้งาน
//$x = '15.00';
//echo  $x  . "=>" .convert($x);
?>




