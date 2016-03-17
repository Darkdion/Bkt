<?php
$this->title = 'แจ้งชำระคอร์สเรียน';
$status = [
    '0' => '<h2><label class="label label-success">ตรวจแล้ว</label></h2>',
    '1' => '<label class="label label-success">แจ้งชำระแล้ว</label>',
    '2' => '<label class="label label-warning">แจ้งชำระไม่ถูกต้อง</label>',
];
?>
<br>
<br>

<div class="row">
    <div class="col-sm-3">
        <div class="panel">
            <div class="panel-body">

                <?php

                echo \yii\bootstrap\Nav::widget([
                    'encodeLabels' => false,
                    'items' => [
                        [
                            'label' => '<i class="fa  fa-line-chart"> </i> แสดงการแจ้งชำระ',
                            'url' => ['paynotify/index'],
                        ],
                        [
                            'label' => '<i class="fa  fa-area-chart "> </i>หลักฐานแจ้งชำระถูกต้อง',
                            'url' => ['paynotify/history'],
                        ],
                        [
                            'label' => '<i class="fa fa-pie-chart"> </i> หลักฐานแจ้งชำระไม่ถูกต้อง',
                            'url' => ['paynotify/false'],
                        ],


                    ],
                    'options' => ['class' =>' nav nav-tabs tabs-left nav-pills'], // set this to nav-tab to get tab-styled navigation
                ]);
                ?>

            </div>
        </div>


    </div>
    <div class="col-sm-9">
<div class="panel  panel-green">
    <div class="panel-heading">
        <h2><i class="fa fa-area-chart faa-shake animated"></i> หลักฐานแจ้งชำระถูกต้อง </h2>

    </div>
    <div class="panel-body">

        <?php if(!empty($model)):?>
        <div class="table-responsive">
            <table class="table table-hover table-bordered" width="100%">
                <thead>
                <tr>
                    <th class="text-center">ลำดับ</th>
                    <th class="text-center">ผู้แจ้งชำระ</th>
                    <th class="text-center">หลักฐาน</th>
                    <th class="text-center">วันที่ชำระ</th>
                    <th class="text-center"> ราคา</th>
                    <th class="text-center">จัดการ</th>

                </tr>
                </thead>
                <tbody>
                <?php $num = 1 ?>
                <?php foreach ($model as $models): ?>
                <tr>


                    <td class="text-center" width="10%"><?= $num++ ?></td>
                    <td class="text-left" width="20%"><?= $models->student->fullName ?></td>
                    <td class="text-center" width="10%">
                        <a href="<?= Yii::getAlias('@frond/paynotify/') . $models->photos ?>"
                           data-title="หลักฐานการชำระ" data-lightbox="Vacation">
                            <img src="<?= Yii::getAlias('@frond/paynotify/') . $models->photos ?>" width="54px"
                                 class="img-thumbnail">
                        </a>

                        <?php
                        echo \branchonline\lightbox\Lightbox::widget([
                            'files' => [[],
                            ]
                        ]);
                        ?>

                    </td>

                    <td class="text-center" width="10%">

                        <?php
                        $source = $models->date_pay;
                        $date = new DateTime($source);
                        echo $date->format('d/m/Y'); // 31.07.2012

                        ?>
                    </td>

                    <td class="text-center" width="10%"><?= number_format($models->price_pay) ?></td>
                    <td class="text-center" width="30%">
                        <?php


                            echo $status[$models->status];

                            ?>


                    </td>
                </tr>
                </tbody>
                <?php endforeach; ?>
            </table>
            <?php else:?>
                <h3 class="text-center ">ไม่พบข้อมูล</h3>
            <?php endif; ?>
        </div>
    </div>
</div>
