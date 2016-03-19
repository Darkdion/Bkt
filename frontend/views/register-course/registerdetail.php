<?php
$student = \common\models\Student::find()->where(['user_id' => Yii::$app->user->id])->one();
$Unrequited = \common\models\RegisterCourse::find()->where(['student_id' => $student->id])->orderBy('id DESC')->all();
//
$this->title = 'รายการลงทะเบียนเรียน';
?>

<?php
function thai_date($time)
{
    global $thai_day_arr, $thai_month_arr;
    // $thai_date_return=" ".$thai_day_arr=array("อาทิตย์","จันทร์","อังคาร","พุธ","พฤหัสบดี","ศุกร์","เสาร์")[date("w",$time)];
    $thai_date_return = "" . date("j", $time);
    $thai_date_return .= " " . $thai_month_arr = array(
            "", "ม.ค.", "ก.พ.", "มี.ค.", "เม.ย", "พ.ค.",
            "มิ.ย.", "ก.ค.", "ส.ค.", "ก.ย.", "ต.ค.",
            "พ.ค", "ธ.ค."
        )[date("n", $time)];
    $thai_date_return .= "" . (date("Y", $time) + 543);
    $thai_date_return .= " เวลา" . date("H:i", $time) . " น.";
    return $thai_date_return;
}

?>
    <br>

    <div class="panel">
    <div class="panel-body">
    <h3><i class="fa fa-credit-card"> </i> รายการทะเบียนเรียน</h3>
    <div class="table-responsive">
<?php if (!empty($Unrequited)): ?>
    <table class="table table-hover ">
    <thead>
    <tr>
        <th  class="text-center">ลำดับ</th>
        <th  class="text-center">เลขที่ใบเสร็จ</th>
        <th  class="text-center">วันที่ลงทะเบียน</th>
        <th  class="text-center">สถานะ</th>
        <th  class="text-center" >จัดการ</th>

    </tr>
    </thead>
    <tbody>

    <?php foreach ($Unrequited as $model): ?>
        <?php
        $price = \common\models\Registerdetail::find()->where(['register_course_id' => $model->id])->all();
        ?>
        <?php foreach ($price as $prices): ?>
<!--            --><?php //echo $prices->id ?>


        <?php endforeach; ?>
        <tr>
        <td class="text-center"><?= $num++ ?></td>
        <td><?= $model->id ?></td>
        <td><?= thai_date($model->created_at); ?></td>

        <td class="text-center">
            <?= $model->status == 0 ? ' <span class="label label-danger">ยังไม่ชำระ</span>' : '<i class="label label-success"></i> <span class="label label-success">ชำระแล้ว</span>'; ?>

        </td>
        <td>
        <div class="text-center">
        <?php if (\common\models\Paynotify::find()->where(['register_course_id' => $model->id, 'status' => 1])->all()): ?>
            <a href="" class="btn btn-blue btn-sm" ><i
                    class="fa fa-spinner faa-spin animated"></i> รอตรวจสอบ</a>

       <?php elseif(\common\models\Paynotify::find()->where(['register_course_id' => $model->id, 'status' => 2])->all()) :?>
            <a href="index.php?r=paynotify/update&id=<?= $model->id; ?>"
               class="btn btn-warning btn-sm">
                <i class="fa fa-bullhorn"></i>
                แจ้งชำระไม่ถูกต้อง
            </a>
        <?php else: ?>
<?php if($model->status == 1):?>

                <?php else:?>
                <a href="index.php?r=paynotify/create&id=<?= $model->id; ?>"
                   class="btn btn-primary btn-sm">
                    <i class="fa fa-bullhorn"></i>
                    แจ้งชำระ
                </a>
                <?php endif;?>
        <?php endif; ?>

        <a href="index.php?r=register-course/detail&id=<?php echo $model->id; ?>"
           class="btn btn-white btn-sm" data-toggle="modal"
           data-target="#myModal"
           data-title=' <h4><i class="fa fa-book"> </i> รายการคอร์สเรียน</h4>'>

            <i class="fa fa-edit"></i> </a>
        <a target="_blank" href="index.php?r=register-course/bill&id=<?= $model->id ?>"
           class="btn btn-info btn-sm"><i class="fa fa-print"></i></a>

        <?php if (\common\models\Paynotify::find()->where(['register_course_id' => $model->id, 'status' => 1])->all()): ?>

            <?php else:?>
            <?php if($model->status==1):?>

            <?php else: ?>
                <?= \yii\bootstrap\Html::a('<i class="faa-pulse animated fa fa-trash"></i> ', ['delete','id'=>$model->id], [
                    'class' => 'btn btn-danger btn-sm btn-raised',
                    // 'disabled' => true,
                    'data' => [
                        'confirm' => 'คุณต้องการลบข้อมูลใช่หรือไม่?',
                        'method' => 'post',
                    ],
                ]) ?>
            <?php endif;?>
        <?php endif;?>

            </div>
            </td>
            </tr>
            </tbody>
            <?php endforeach; ?>
            <?php else: ?>

            <h2 class="title text-center text-danger">ไม่พบข้อมูล</h2>
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
            'size' => 'modal-lg'
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