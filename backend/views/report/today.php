<?php
use yii\widgets\ActiveForm;

$sumtotall = 0;
$id = '';
?>

<div class="panel">
    <div class="panel-body">
        <h4>รายงานประจำวัน -เดือน -ปี </h4>
        <hr>

        <!-- filter -->
        <?php $f = ActiveForm::begin(['options' => [
            'class' => 'form-inline',
            'name' => 'formReport'
        ]]); ?>

        <label>เดือน</label>

        <select name="month" class="form-control">
            <?php foreach ($month_list as $month): ?>
                <option value="<?php echo $month; ?>"
                    <?php if ($m == $month): ?>
                        selected
                    <?php endif; ?>
                >
                    <?php echo $month; ?>
                </option>
            <?php endforeach; ?>
        </select>
        <label>&nbsp;ปี </label>
        <select name="year" class="form-control">
            <?php foreach ($year_list as $year): ?>
                <option value="<?php echo $year; ?>"
                    <?php if ($y == $year): ?>
                        selected
                    <?php endif; ?>
                >
                    <?php echo $year; ?>
                </option>
            <?php endforeach; ?>
        </select>
        <div class="input-group ">
                <span class="input-group-btn">

            <a href="javascript:void(0)"
               onclick="document.formReport.submit()"
               class="btn btn-primary">
                <i class="glyphicon glyphicon-retweet"> </i> ประมวลผล
            </a>

      </span>
        </div>


        <?php ActiveForm::end(); ?>

        <!-- data -->
<?php if( !empty($Registerdetail)): ?>

        <table width="100%" style="margin-top: 20px" class="table table-bordered table-striped">
            <thead>
            <tr>
                <td width="10%" class="text-center">#</td>
                <td width="10%" class="text-center">วันที่</td>
                <td width="20%" class="text-center">เลขที่ใบเสร็จ</td>
                <td width="30%" class="text-center">ชื่อคอร์สเรียน</td>
                <td width="25%" class="text-center"> ราคา</td>
            </tr>
            </thead>
            <tbody>
            <?php $i=0; foreach ($Registerdetail as $model): ?>
                <?php $sumtotall += $model->price ?>

                <?php
                $id = $model->register_course_id;
                $VAT = ($sumtotall * 0.07); //หาค่า VAT 7%
                $SUMVAT = ($sumtotall + $VAT); //บวกเพิ่มกับ VAT ที่ได้
                ?>
                <?php
                $d = $model->registerCourse->pay_date;
                $d = explode(' ', $d);
                $d = explode('-', $d[0]);
                $d = $d[2];


                ?>
<!--                เก็บค่า id -->
                <?php $idprint[$i]= $model->id ?>
                <tr>
                    <td style="text-align: center"><?php echo $n++; ?></td>



                    <td><?php echo $d; ?></td>
                    <td><?php echo $model->register_course_id; ?></td>


                    <td style="text-align: right">
                        <?php echo $model->course->name; ?>
                    </td>
                    <td style="text-align: right">
                        <?php echo number_format($model->price); ?>
                    </td>

                </tr>

            <?php   $i+=1; endforeach; ?>


            </tbody>

        </table>
<?php else:?>
<br>
    <br>
    <br>
<?php endif; ?>

<?php if(!empty($idprint)): ?>
    <a  target="_blank" href="<?= \yii\helpers\Url::to(['report/todayreport','id'=>$idprint])?>" class="btn btn-success"> <i class="fa fa-print"></i> พิมพ์</a>
        <?php else: ?>


        <?php endif; ?>

        <div class=" pull-right count" style="font-size: 30pt"> รวมยอด
            <?php if (!empty($SUMVAT)) : ?>
                <?php echo number_format($SUMVAT, 2, '.', ','); ?>
            <?php else: ?>
                <?php
                $SUMVAT = 0;
                echo number_format($SUMVAT, 2, '.', ','); ?>
            <?php endif; ?>
            บาท

        </div>


    </div>
</div>
