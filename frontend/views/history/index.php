<?php
use common\models\Registerdetail;

function thai_date($time){
    global $thai_day_arr,$thai_month_arr;
    // $thai_date_return=" ".$thai_day_arr=array("อาทิตย์","จันทร์","อังคาร","พุธ","พฤหัสบดี","ศุกร์","เสาร์")[date("w",$time)];
    $thai_date_return= "วันที่ ".date("j",$time);
    $thai_date_return.=" ".$thai_month_arr=array(
            "","ม.ค.","ก.พ.","มี.ค.","เม.ย", "พ.ค.",
            "มิ.ย.", "ก.ค.", "ส.ค.","ก.ย.", "ต.ค.",
            "พ.ค", "ธ.ค."
        )[date("n",$time)];
    $thai_date_return.= "".(date("Y",$time)+543);
     $thai_date_return.= " เวลา ".date("H:i",$time)." น.";
    return $thai_date_return;
}
?>

<div class="panel">
    <div class="panel-body">
        <h3>
            <i class="glyphicon glyphicon-th-list"></i>
            ประวัติการลงทะเบียน
        </h3>
        <hr>

        <?php foreach ($Register as $Registers): ?>
            <h4>
            <hr>

                <?php echo thai_date($Registers->created_at); ?>


                <div class="text-right">
                <b>สถานะ :</b><?php echo $Registers->status ==0 ?
                        '<span class="label label-danger">ยังไม่ชำระ</span>' :
                        '<span class="label label-success text-warning">ชำระแล้ว</span>'
                    ; ?>
                </div>
            </h4>
            <table style="margin-bottom: 50px" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th width="40px" style="text-align: right">ลำดับ</th>
                    <th width="100px">code</th>
                    <th>ชื่อคอร์สเรียน</th>
                    <th width="80px" style="text-align: right">ราคา</th>


                </tr>
                </thead>
                <tbody>
                <?php
                $Registerdetail = Registerdetail::find()
                    ->where(['register_course_id' => $Registers->id])
                    ->orderBy('id DESC')
                    ->all();
                $Num = 1;
                ?>

                <?php foreach ($Registerdetail as $Registerdetails): ?>
                    <?php
                   // $Sumprice=;
                    $Sumprice+=$Registerdetails->price;
                    ?>
                    <tr>
                        <td style="text-align: right"><?php echo $Num++; ?></td>
                        <td><?php echo $Registerdetails->course->cod_id; ?></td>
                        <td><?php echo $Registerdetails->course->name; ?></td>
                        <td style="text-align: right">
                            <?php echo number_format($Registerdetails->price); ?>
                        </td>


                    </tr>
                <?php endforeach; ?>
                </tbody>
<!--                <tfoot>-->
<!--                <tr>-->
<!--                    <td colspan="4"><strong>ยอดรวม</strong></td>-->
<!---->
<!--                    <td style="text-align: right">-->
<!--                        --><?php //echo number_format($Sumprice); ?>
<!--                    </td>-->
<!--                </tr>-->
<!--                </tfoot>-->
            </table>
        <?php endforeach; ?>
    </div>
</div>
