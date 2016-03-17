

<br>
<br>
<div class="panel" style="font-size: 15pt " >
    <div class="panel-body">
         <div class="table-responsive">
			 <h3 class="glyphicon glyphicon-th-large"> รายละเอียด</h3>
         	<table class="table table-hover">
         		<thead>
         			<tr>
         				<th>ลำดับ</th>
						<th>ชื่อคอร์สเรียน</th>
						<th>ราคา</th>
         			</tr>
         		</thead>
         		<tbody>
                <?php
				$Num=1;
				$Sum='';
                foreach ($Detail as $model):
                  $Sum+=$model->price
                ?>
					<?php

					$VAT = ($Sum * 0.07); //หาค่า VAT 7%
					$SUMVAT = ($Sum + $VAT); //บวกเพิ่มกับ VAT ที่ได้
					?>
         			<tr>
         				<td><?=$Num++ ?></td>
						<td><?=$model->Namecourse?></td>
						<td><?=$model->price?></td>
         			</tr>
                <?php endforeach;?>
         		</tbody>
         	</table>
			 <table class="table table-hover" width="100%">

			 	<tbody>
			 		<tr>
						<td rowspan="3"  width="70%"></td>
						<td  width="20%">ยอดรวม</td>
			 			<td width="10%"><?= number_format($Sum, 2, '.', '')?></td>
			 		</tr>
					<tr>

						<td  width="20%">VAT 7 %</td>
						<td width="10%"><?= number_format($VAT, 2, '.', '')?></td>
					</tr>
					<tr>

						<td  width="20%">ยอดรวม</td>
						<td width="10%"><?= number_format($SUMVAT, 2, '.', '')?></td>
					</tr>

			 	</tbody>
			 </table>
         </div>
		<div class="text-center">
			<?php echo  \yii\helpers\Html::a('กลับหลัก',['show'],['class'=>'btn-info btn btn-lg']);?>
		</div>
    </div>
</div>