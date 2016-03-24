<?php
use yii\widgets\ActiveForm;
use yii\widgets\ListView;
use common\models\Course;

$sumtotall = 0;
$id = '';
 function getName($val){
    $course= Course::find()->where(['id'=>$val])->one();
    return $course->name;
}
?>

<div class="panel">
    <div class="panel-body">
        <h4>รายงานตามช่วงเวลา</h4>
        <hr>

        <!-- filter -->
        <?php $f = ActiveForm::begin(['options' => [
            'class' => 'form-inline',
            'name' => 'formReport'
        ]]); ?>

        <label for="">ตั้งแต่</label>
        <?php
        echo \kartik\widgets\DatePicker::widget([
            'name' => 'date1',
            'value' => $date1,
            'type' => \kartik\widgets\DatePicker::TYPE_INPUT,
            'language' => 'th',
            'pluginOptions' => [
                'format' => 'yyyy/m/d',
                'todayHighlight' => true,
            ]
        ]);
        ?>
        <label for="">ถึง</label>
        <?php
        echo \kartik\widgets\DatePicker::widget([
            'name' => 'date2',
            'value' => $date2,
            'type' => \kartik\widgets\DatePicker::TYPE_INPUT,
            'language' => 'th',
            'pluginOptions' => [
                'format' => 'yyyy/m/d',
                'todayHighlight' => true,
            ]
        ]);
        ?>
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

<?php if( !empty($rawData)): ?>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>ลำดับ</th>
                    <th>เลขที่ใบเสร็จ</th>
                    <th>คอสเรียน</th>
                    <th>ราคา</th>
                </tr>
                </thead>
                <tbody>

                <?php
                $con=count($rawData);
                $i=0;
                $a=1;
               while($i<$con){ $ar= $rawData[$i]; ?>
                   <tr>
                       <?php $id[$i]=$ar['id']?>
                       <td><?=$a?></td>
                       <td><?=$ar['id']?></td>
                       <td><?=getName($ar['course_id'])?></td>
                       <td><?=$ar['price']?></td>
                      <?php $sumtotall += $ar['price']?>

                   </tr>
                <?php   $a++;$i++;  }
//               $rawData;


                ?>

                <?php
                $VAT = ($sumtotall * 0.07); //หาค่า VAT 7%
                $SUMVAT = ($sumtotall + $VAT); //บวกเพิ่มกับ VAT ที่ได้

                ?>
                </tbody>
            </table>
            <a target="_blank" href="<?= \yii\helpers\Url::to(['report/today2re','id'=>$id])?>" class="btn btn-success"> <i class="glyphicon glyphicon-print"></i> พิมพ์</a>
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
</div>

<?php else:?>
    <br>
    <br>
    <br>
<?php endif; ?>


