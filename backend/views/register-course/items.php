<?php
$cart = $_SESSION['carts'];
?>

<div class="card">


<div class="table-responsive">
	<table class="table table-hover ">
		<thead>
			<tr>
				<th></th>
			</tr>
		</thead>
		<tbody>
        <?php
        foreach($cart as $result){
        ?>
            <tr>
                <?php
                $carts = \common\models\Course::find()->where(['id'=>$result])->all();

                foreach($carts as $model){
                    ?>
                    <td><?= $result ?></td>
                    <td><?= $model->name ?></td>
                    <td><?= $model->name ?></td>
                    <?php
                }

                ?>

            </tr>
            <br>
            <?php
        }
        ?>
		</tbody>
	</table>
</div>


</div>

