<?php

?>
<?php
function thai_date($time){
    global $thai_day_arr,$thai_month_arr;
   // $thai_date_return="".$thai_day_arr=array("อาทิตย์","จันทร์","อังคาร","พุธ","พฤหัสบดี","ศุกร์","เสาร์")[date("w",$time)];
    $thai_date_return= " ".date("j",$time);
    $thai_date_return.=" เดือน".$thai_month_arr=array(
            "","มกราคม","กุมภาพันธ์","มีนาคม","เมษายน", "พฤษภาคม",
            "มิถุนายน", "กรกฎาคม", "สิงหาคม","กันยายน", "ตุลาคม",
            "พฤศจิกายน", "ธันวาคม"
        )[date("n",$time)];
    $thai_date_return.= " ".(date("Y",$time)+543);
    // $thai_date_return.= " ".date("H:i",$time)." น.";
    return $thai_date_return;
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<style>

</style>
<body>
<div class="container" style="padding-left: 50px; font-size:15pt;">
    <div>
        <div style="padding-left:450px;"><strong>&nbsp;&nbsp;&nbsp;&nbsp; วันที่ <?= thai_date(time()) ?> <strong>

        </div>
        <!--                <img src="images/icons/k.jpg" width="75" height="71" class="pull-left" style="margin-top: 1px;">-->
        <div style="margin-left: 200px;">
            <strong style="font-size:21pt; padding-right: 300px">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                รายชื่อนักเรียนทั้งหมด</strong>
        </div>
    </div>
    <div>


        <br>


        <table class="table table-bordered" style="font-size:15pt ; ">
            <thead>
            <tr>
                <td class="text-center">ลำดับ</td>
                <td class="text-center"><strong>ชื่อ - นามสกุล</strong></td>
                <td class="text-center"><strong>เพศ</strong></td>
                <td class="text-center"><strong>กำลังศึกษาอยู่</strong></td>
                <td class="text-center"><strong>สถานศึกษา</strong></td>
                <td class="text-center"><strong>เลขบัตรประชาชน</strong></td>


            </tr>
            </thead>
            <tbody>
            <?php $no = 1; ?>
            <?php foreach ($model as $models): ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?=$models->fullName ?></td>
                    <td><?=$models->sexName ?></td>
                    <td><?= $models->education?></td>
                    <td><?= $models->schoolName?></td>
                    <td><?= $models->identification?></td>

                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>


        <br><br>


    </div>
</div>

</body>
</html>


