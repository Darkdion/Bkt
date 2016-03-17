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
            'options' => ['class' =>' nav nav-tabs nav-pills'], // set this to nav-tab to get tab-styled navigation
        ]);
        ?>
        <br>
        <br>
        <h3 class="text-danger"><i class="fa fa-shopping-cart"></i> ยังไม่ชำระ</h3>
        <?php if(!empty($models)):?>
        <div class="table-responsive">
            <table class="table table-hover" width="100%"style="font-size: 14pt;">
                <thead>
                <tr>
                    <th width="10%" class="text-center">ลำดับ</th>
                    <th width="20%" class="text-center">เลบที่ใบเสร็จ</th>
                    <th width="20%" class="text-center">ผู้ลงลงทะเบียน</th>
                    <th width="20%" class="text-center">วันที่ลงทะเบียน</th>
                    <th width="10%" class="text-center">สถานะ</th>
                    <th width="30%" class="text-center">จัดการ</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $Num = 1;
                foreach ($models as $show):

                    ?>

                    <tr>
                        <td class="text-center"><?= $Num++ ?></td>
                        <td class="text-center"><?= $show->id ?></td>
                        <td ><?= $show->student->fullName ?></td>
                        <td class="text-center"><?= $show->created_at ?></td>

                        <td><?= $show->status==0?'<span class="label label-danger"><i class="fa fa-remove"></i> ยังไม่ชำระ</span>':
                                '<span class="label label-success"><i class="fa fa-remove"></i> ชำระแล้ว</span>' ?></td>
                        <td >
                            <a href="index.php?r=register-course/detail&id=<?=$show->id?>" class="btn btn-success btn-sm"><span class="fa fa-edit"> </span>ดูรายละเอียด</a>
                            <a href="index.php?r=register-course/cancel&id=<?=$show->id?>" class="btn btn-danger  btn-sm"><i class="fa fa-ban"> </i> ยกเลิก</a>
                        </td>
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