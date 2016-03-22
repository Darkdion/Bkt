<?php
use branchonline\lightbox\Lightbox;

$status = [
    '0' => '<h4><label class="label label-success">ตรวจแล้ว</label></h4>',
    '1' => '<label class="label label-success">แจ้งชำระแล้ว</label>',
    '2' => '<label class="label label-warning">แจ้งชำระไม่ถูกต้อง</label>',
];
function thai_date($time)
{
    global $thai_day_arr, $thai_month_arr;
    // $thai_date_return=" ".$thai_day_arr=array("อาทิตย์","จันทร์","อังคาร","พุธ","พฤหัสบดี","ศุกร์","เสาร์")[date("w",$time)];
    $thai_date_return = "" . date("j", $time);
    $thai_date_return  .= " " . $thai_month_arr = array(
            " ","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค."
        )[date("n", $time)];
    $thai_date_return .= "" . (date("Y", $time) + 543);
    //$thai_date_return .= " เวลา" . date("H:i", $time) . " น.";
    return $thai_date_return;
}
?>

<div class="panel">
<div class="panel-body">
    <h4><i class="fa fa-exclamation-circle"></i> ประวัติแจ้งชำระ</h4>
    <hr>



    <div class="table-responsive">
<?php if(!empty($model)):?>
    	<table class="table table-hover table-bordered" width="100%">
    		<thead>
    			<tr>
    				<th class="text-center">ลำดับ</th>
                    <th class="text-center">หลักฐานการชำระ</th>
                    <th class="text-center">สถานะ</th>
                    <th class="text-center">วันที่ชำระ</th>
                    <th class="text-center">ราคา</th>

    			</tr>
    		</thead>
    		<tbody>
            <?php $num=1?>
            <?php foreach( $model as $models):?>
    			<tr>


    				<td class="text-center" width="10%"><?=$num++?></td>
                    <td class="text-center" width="20%" >
                        <a href="<?=$models->getPhotoViewer()?>" data-title="หลักฐานการชำระ" data-lightbox="Vacation">
                            <img src="<?=$models->getPhotoViewer()?>" width="54px" class="img-thumbnail">
                        </a>

                        <?php
                        echo Lightbox::widget([
                            'files' => [ [      ],
                            ]
                        ]);
                        ?>

                    </td >
                    <td class="text-center" width="20%"><?=$status[$models->status];?></td>
                    <td class="text-center" width="30%">

                        <?php
                        $source = $models->date_pay;
                        $date = new DateTime($source);
                        echo $date->format('d/m/Y'); // 31.07.2012

                        ?>
                    </td>
                    <td class="text-center" width="20%"><?= number_format($models->price_pay) ?></td>
    			</tr>
    		</tbody>
            <?php endforeach;?>
    	</table>
        <?php else:?>
    <h2 class="text-center text-danger">ไม่พบข้อมูลประวัติการชำระ</h2>
        <?php endif;?>
    </div>



</div>
</div>



