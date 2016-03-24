<?php
$sumtotall = 0;
?>
<?php
function thai_date($time){
	global $thai_day_arr,$thai_month_arr;
	// $thai_date_return="".$thai_day_arr=array("อาทิตย์","จันทร์","อังคาร","พุธ","พฤหัสบดี","ศุกร์","เสาร์")[date("w",$time)];
	$thai_date_return= " ".date("j",$time);
	$thai_date_return.=" เดือน".$thai_month_arr=array(
			"","มกราคม","กุมภาพันธ์","มีนาคม","เมษายน", "พฤษภาคม",
			"มิถุนายน", "กรกฎาคม", "สิงหาคม","กันยายน", "ตุลาคม",
			"พฤศจิกายน", "ธันวาคม"
		)[date("n",$time)];
	$thai_date_return.= " ".(date("Y",$time)+543);
	// $thai_date_return.= " ".date("H:i",$time)." น.";
	return $thai_date_return;
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<style>

</style>
<body>
<div class="container" style="padding-left: 50px; font-size:15pt;">
	<div>
		<div style="padding-left:450px;"><strong>&nbsp;&nbsp;&nbsp;&nbsp; วันที่ <?= thai_date(time()) ?> <strong>

		</div>
		<!--                <img src="images/icons/k.jpg" width="75" height="71" class="pull-left" style="margin-top: 1px;">-->
		<div style="margin-left: 200px;">
			<strong style="font-size:21pt; padding-right: 300px">
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

				รายงานสรุปยอด</strong>
		</div>
	</div>
	<div>


		<br>


		<table class="table table-bordered" style="font-size:15pt ; ">
			<thead>
			<tr>
				<td class="text-center">ลำดับ</td>

				<td class="text-center"><strong>วันที่</strong></td>
				<td class="text-center"><strong>เลขที่ใบเสร็จ</strong></td>
				<td class="text-center"><strong>คอร์สเรียน</strong></td>
			</tr>
			</thead>
			<tbody>


			<?php $no = 1; ?>
			<?php foreach ($Registerdetail as $models): ?>
				<?php
				$sumtotall += $models->price;
				$VAT = ($sumtotall * 0.07); //หาค่า VAT 7%
				$SUMVAT = ($sumtotall + $VAT); //บวกเพิ่มกับ VAT ที่ได้
				?>
				<?php
				$d = $models->registerCourse->pay_date;
				$d = explode(' ', $d);
				$d = explode('-', $d[0]);
				$d = $d[2];


				?>
				<tr>
					<td><?= $no++; ?></td>
					<td class="text-center"><?php  $source =$models->registerCourse->pay_date;
						$date = new DateTime($source);
						echo $date->format('d/m/Y'); // 31.07.2012 ?></td>
					<td class="text-center"><?= $models->register_course_id; ?></td>
					<td><?= $models->course->name;?></td>


				</tr>
			<?php endforeach; ?>
			</tbody>
		</table>


		<br>

		<?php if(!empty($SUMVAT)):?>
			<div style="font-size: 30pt; padding-left: 200px; "> รวมเป็นเงินทั้งสิ้น  <?php echo number_format($SUMVAT, 2, '.', ','); ?> บาท </div>
		<?php else:?>
			<div style="font-size: 30pt; padding-left: 200px; "> รวมเป็นเงินทั้งสิ้น  <?php echo number_format(0, 2, '.', ','); ?> บาท </div>
		<?php endif;?>


	</div>
</div>

</body>
</html>


