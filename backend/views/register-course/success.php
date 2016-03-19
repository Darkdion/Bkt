<div class="panel">
    <div class="panel-body">

        <?php

        echo \yii\bootstrap\Nav::widget([
            'encodeLabels' => false,
            'items' => [
                [
                    'label' => '<h5><i class="fa fa-shopping-bag"> </i> แสดงผู้ที่ยังไม่ชำระ</h5>',
                    'url' => ['register-course/show'],
                ],
                [
                    'label' => '<h5><i class="glyphicon glyphicon-ok-sign"> </i> แสดงผู้ที่ชำระแล้ว</h5>',
                    'url' => ['register-course/success'],
                ],



            ],
            'options' => ['class' =>' nav nav-tabs  nav-justified nav-pills'], // set this to nav-tab to get tab-styled navigation
        ]);
        ?>
        <br>
        <br>
            </div>
</div>
<div class="panel">
            <div class="panel-body">
      <h3 class="text-success" >
          <i class="glyphicon glyphicon-ok-sign "></i>
          ชำระแล้ว
      </h3>

        <?php if(!empty($models)):?>
        <div class="table-responsive">
            <table class="table table-hover" width="100%"style="font-size: 16pt;">
                <thead>
                <tr>
                    <th width="10%">ลำดับ</th>
                    <th width="20%">เลบที่ใบเสร็จ</th>
                    <th width="20%">ผู้ลงลงทะเบียน</th>
                    <th width="20%">วันที่ชำระ</th>
                    <th width="10%">สถานะ</th>
                    <th width="20%">จัดการ</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $Num = 1;
                foreach ($models as $show):

                    ?>

                    <tr>
                        <td><?= $Num++ ?></td>
                        <td><?= $show->id ?></td>
                        <td><?= $show->student->fullName ?></td>
                        <td><?php
                            echo DateThai($show->pay_date )

//                            $source = $show->pay_date ;
//                        $date = new DateTime($source);
//                        echo $date->format('d/m/Y'); // 31.07.2012
                            ?></td>

                        <td><?= $show->status==0?'<span class="label label-danger"><i class="fa fa-remove"></i> ยังไม่ชำระ</span>':'<span class="label label-success"><i class="glyphicon glyphicon-ok"></i> ชำระแล้ว</span>' ?></td>
                        <td><a href="index.php?r=register-course/detail&id=<?=$show->id?>" class="btn btn-info btn-xs"><span class="fa fa-edit"> </span>ดูรายละเอียด</a></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>


        <div class="text-center">
            <?php
            echo \yii\widgets\LinkPager::widget([
                'pagination' => $pages,
            ]);

            ?>
        </div>

        <?php else:?>
            <h3 class="text-center">ไม่พบข้อมูล</h3>
        <?php endif;?>


    </div>
</div>

<?php
function DateThai($strDate)
{
    $strYear = date("Y",strtotime($strDate))+543;
    $strMonth= date("n",strtotime($strDate));
    $strDay= date("j",strtotime($strDate));
    $strHour= date("H",strtotime($strDate));
    $strMinute= date("i",strtotime($strDate));
    $strSeconds= date("s",strtotime($strDate));
    $strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
    $strMonthThai=$strMonthCut[$strMonth];
    return "$strDay $strMonthThai $strYear";
}


?>