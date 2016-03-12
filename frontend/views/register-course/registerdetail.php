<?php
$student =\common\models\Student::find()->where(['user_id'=>Yii::$app->user->id])->one();


$Unrequited= \common\models\RegisterCourse::find()->where(['student_id'=>$student->id]) ->orderBy('id DESC')->all();

//
$this->title='รายการลงทะเบียนเรียน';

?>

<?php
function thai_date($time){
    global $thai_day_arr,$thai_month_arr;
   // $thai_date_return=" ".$thai_day_arr=array("อาทิตย์","จันทร์","อังคาร","พุธ","พฤหัสบดี","ศุกร์","เสาร์")[date("w",$time)];
    $thai_date_return= "".date("j",$time);
    $thai_date_return.=" ".$thai_month_arr=array(
            "","ม.ค.","ก.พ.","มี.ค.","เม.ย", "พ.ค.",
            "มิ.ย.", "ก.ค.", "ส.ค.","ก.ย.", "ต.ค.",
            "พ.ค", "ธ.ค."
        )[date("n",$time)];
    $thai_date_return.= "".(date("Y",$time)+543);
    // $thai_date_return.= " ".date("H:i",$time)." น.";
    return $thai_date_return;
}
?>
<br>

<div class="panel">
<div class="panel-body">
    <h4>  <i class="fa fa-credit-card"> </i> รายการทะเบียนเรียน</h4>
    <div class="table-responsive">
        <?php if(!empty($Unrequited)): ?>
        <table class="table table-hover table-bordered">
            <thead>
            <tr>
                <th>ลำดับ</th>
                <th>เลขที่ใบเสร็จ</th>
                <th>วันที่ลงทะเบียน</th>
                <th>สถานะ</th>
                <th></th>

            </tr>
            </thead>
            <tbody>

            <?php foreach($Unrequited as $model):?>
            <?php
            $price=\common\models\Registerdetail::find()->where(['register_course_id'=> $model->id])->all();

            ?>
            <?php foreach($price as $prices ):?>
<!--                --><?php //echo $prices->price ?>


            <?php endforeach;?>
            <tr>
                <td class="text-center"><?=$num ++ ?></td>
                <td><?=$model->id ?></td>
                <td><?=thai_date($model->created_at); ?></td>

                <td class="text-center">
                    <?= $model->status==0?' <span class="label label-danger">ยังไม่ชำระ</span>':'<i class="label label-success"></i> <span class="label label-success">ชำระแล้ว</span>';?>

                </td>
                <td>
                  <div class="btn-group btn-group-sm text-center">
        <?php if($model->status ==0):?>



            <a href="" class="btn btn-primary btn-sm" ><i class="fa fa-bullhorn"></i> แจ้งชำระ</a>
            <?php else:?>
            <a href="" class="btn btn-green btn-sm" disabled="true"><i class="fa fa-bullhorn"></i> แจ้งแล้ว</a>
            <?php endif;?>

                    <a href="index.php?r=register-course/detail&id=<?php echo $model->id; ?>"
                       class="btn btn-warning btn-sm" data-toggle="modal"
                       data-target="#myModal" data-title=' <h4><i class="fa fa-book"> </i> รายการคอร์สเรียน</h4>'>

                        <i class="fa fa-edit"></i> รายละเอียด</a>
 <a href="" class="btn btn-info btn-sm"><i class="fa fa-print"></i> พิมพ์ใบเสร็จ</a>
                  </div>
                </td>
            </tr>
            </tbody>
            <?php endforeach;?>
            <?php else:?>

                <h2 class="title text-center">ไม่มีข้อมูลยังไม่ขำระ</h2>
            <?php endif; ?>
        </table>
    </div>

</div>
</div>
<style>
    #table2 {
        width: 100%;
    }

    table, th, td {
        font-size: 16px;
    }

</style>

<?php
\yii\bootstrap\Modal::begin([
    'id' => 'myModal',
    'header' => '<h4 class="modal-title">...</h4>',
    'size'=>'modal-lg'
]);
\yii\bootstrap\Modal::end();
?>
<?php
$this->registerJs("
    $('#myModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var modal = $(this)
        var title = button.data('title')
        var href = button.attr('href')
        modal.find('.modal-title').html(title)
        modal.find('.modal-body').html('<i class=\"fa fa-spinner fa-spin\"></i>')
        $.post(href)
            .done(function( data ) {
                modal.find('.modal-body').html(data)
            });
        })
");
