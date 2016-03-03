<?php


?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<div class="container" style="padding-left: 50px; font-size:15pt;">

    <div class="row">
        <div class="col-md-4">
            <div class="well" style="width: 150px; height: 50px;">
                <strong style="font-size:28pt;  ">ใบเสร็จรับเงิน</strong>
            </div>
        </div>
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <div style="padding-left:500px;margin-top: -100px"> เลขที่ใบเสร็จ &nbsp;&nbsp;
                <?= $model->id; ?></div>
            <div style="padding-left:500px;"> วันที่ &nbsp;
                <?= date('d/m/Y') ?></div>
        </div>
        <br>
        <div class="text-center">
            <img src="logo/logo.png" width="75" height="71" class="" style="margin-top: 1px;"><br>
            <strong style="font-size:30pt;  ">สถาบันกวดวิชาบ้านครูติ๊กติวเตอร์</strong>
        </div>

    </div>

    <div style="font-size: 20px;">
        ได้รับเงินจาก&nbsp; <b style="font-weight:bold;"><?= $model->fullName ?></b>
    </div>
    <br>
    <table class="table " style="font-size:15pt; ">
        <thead>
        <tr>
            <td>#</td>
            <td colspan="3 " class="text-center"><strong>รายการคอร์สเรียน</strong></td>

            <td class="text-right"><strong>ราคา</strong></td>

        </tr>
        </thead>
        <tbody>
        <?php $no = 1; ?>
        <!--            ลูปข้อมูล -->
        <?php foreach (\common\models\RegisterCourse::find()->where(['id' => $model->id])->all() as $row): ?>


            <?php foreach (\common\models\Registerdetail::find()->where(['register_course_id' => $modeldetail->id])->all() as $course): ?>
                <?php $sumtotall += $course->price ?>
                <tr>
                    <td><?= $no++; ?></td>

                    <td colspan="3" style="text-align:left"><?= $course->nameCourse; ?></td>
                    <td style="text-align:right"><?= number_format($course->price) . '.00'; ?></td>


                </tr>
            <?php endforeach; ?>
        <?php endforeach; ?>

        </tbody>
        <tfoot>
        <tr>
            <td colspan="3" style="font-size: 22px; font-weight:bold;">
                รวมจำนวนเงิน (ตัวอักษร) &nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp; <?php echo convert($sumtotall . '.00'); ?>

            </td>
            <td style="font-size: 20px; font-weight:bold; "></td>
            <td style="font-size: 22px; font-weight:bold;"><?php echo number_format($sumtotall) . '.00' ?> </td>
        </tr>

        </tfoot>
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

    <hr>
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




