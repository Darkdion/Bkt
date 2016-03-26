<?php
//var_dump($registerdetail);
?>
<div class="panel">
    <div class="panel-body">
        <h4 class="text-right">เลขที่ใบเสร็จ <strong><?= $register->id ?></h4></strong>
        <div class="">
            <table  class="table table-hover">
                <thead>
                <tr>
                    <th>#</th>
                    <th>ชื่อคอร์สเรียน</th>
                    <th>ราคา</th>


                </tr>
                </thead>
                <tbody>
                <?php foreach ($registerdetail as $registerdetails): ?>
                    <?php $sumtotall += $registerdetails->price ?>
                    <tr>
                        <td><?= $n++ ?></td>
                        <td>   <?php echo $registerdetails->nameCourse ?></td>
                        <td>   <?php echo number_format($registerdetails->price) ?></td>
                    </tr>
                <?php endforeach; ?>
                <?php

                $VAT = ($sumtotall * 0.07); //หาค่า VAT 7%
                $SUMVAT = ($sumtotall + $VAT); //บวกเพิ่มกับ VAT ที่ได้
                ?>
                </tbody>
                <tr>
                    <td ></td>
                    <td  class="text-right">ราคารวม</td>
                    <td  class="text-right"><?= number_format($sumtotall, 2, '.', ',') ?></td>
                </tr>
                <tr>
                    <td width="50%"></td>
                    <td width="25%" class="text-right">VAT 7 %</td>
                    <td width="25%" class="text-right"><?= number_format($VAT, 2, '.', ',') ?> </td>
                </tr>
                <tr>
                    <td></td>
                    <td class="text-right">ยอดรวมสุทธิ</td>
                    <td class="text-right"><b>
                            <?= number_format($SUMVAT, 2, '.', ',') ?>
                        </b></td>
                </tr>

            </table>

            <!--            <div class="row " style="font-size: 18px">-->
            <!--                <div class="col-md-8">-->
            <!---->
            <!--                </div>-->
            <!--                <div class="col-md-4">-->
            <!--                    <div class="row">-->
            <!--                        <div class="col-md-6  text-right ">ราคารวม</div>-->
            <!--                        <div class="col-md-6 text-right">-->
            <? //= number_format($sumtotall, 2, '.', '') ?><!--</div>-->
            <!--                    </div>-->
            <!--                    <div class="row">-->
            <!--                        <div class="col-md-6  text-right">VAT 7 %</div>-->
            <!--                        <div class="col-md-6 text-right">-->
            <!--                            --><?php // echo number_format($vat, 2, '.', '') ?>
            <!--                        </div>-->
            <!--                    </div>-->
            <!--                    <div class="row">-->
            <!--                        <div class="col-md-6 text-right">ราคาสุทธิ</div>-->
            <!--                        <div class="col-md-6 text-right">-->
            <!--                            <b> --><?php // echo number_format($SUMVAT, 2, '.', '') ?><!-- </b>-->
            <!--                        </div>-->
            <!---->
            <!--                    </div>-->
            <!---->
            <!--                </div>-->
            <!--            </div>-->


        </div>

    </div>
</div>
<div class="text-right">

    <button type="button" class="btn btn-default " data-dismiss="modal">ปิดหน้านี้</button>
</div>
<style>
    #table2 {
        width: 100%;
    }

    table, th, td {
        font-size: 18px;
    }

</style>


