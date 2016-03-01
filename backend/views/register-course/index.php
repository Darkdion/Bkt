<?php
use yii\widgets\ActiveForm;
use yii\widgets\LinkPager;
use yii\web\Session;

$session = new Session();
$session->open();

$this->title = 'ลงทะเบียนคอร์สเรียน ';
$this->params['breadcrumbs'][] = ['label' => 'จัดการคอร์สเรียน', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>


<div style="position: absolute;z-index: 1500;right: 0px;top: 80px;position: fixed;">
<a href="index.php?r=register-course/addtocart" class="btn btn-lg btn-default">
    <i class="glyphicon glyphicon-book"></i>
    รายการคอร์สเรียน
                    <span class="badge">
                      <?php
                      $countItemsInCart = 0;

                      if (!empty($session->get('coursecart'))) {
                          $countItemsInCart = count($session->get('coursecart'));
                      }
                      ?>
                      <?php echo $countItemsInCart; ?>
                    </span>
</a>
</div>

<!---->
<!--        <div class="pull-left">-->
<!--            <a href="index.php?r=course-register/index&sort=box" class="btn btn-primary">-->
<!--                <i class="glyphicon glyphicon-th"></i>-->
<!--            </a>-->
<!--            <a href="index.php?r=course-register/index&sort=list" class="btn btn-primary">-->
<!--                <i class="glyphicon glyphicon-th-list"></i>-->
<!--            </a>-->
<!--        </div>-->
        <div class="text-center">
            <?php ActiveForm::begin([
                'action' => 'pay.php?r=register-course/index',
                'options' => [
                    'class' => 'form-inline',
                    'name' => 'formProduct'
                ]
            ]); ?>
            <input type="text" name="search" class="form-control" placeholder="Search..." />
            <a class="btn btn-primary  " onclick="document.formProduct.submit()">
                <i class="glyphicon glyphicon-search"></i>
            </a>
            <?php ActiveForm::end(); ?>
        </div>
        <div class="clearfix"></div>
        <br>
<div class="table-responsive">
    <div class="x_panel">
        <div class="x_title">
            <h2><i class="fa fa-book faa-horizontal animated"></i> คอร์สเรียน </h2>

            <div class="clearfix"></div>
        </div>

        <div class="x_content">



            <table class="table table-striped responsive-utilities jambo_table bulk_action">
		<thead>
			<tr>
                <th>รหัสคอร์สเรียน</th>
                <th>ชื่อคอร์สเรียน</th>
                <th>ราคา</th>
                <th>เลือก</th>
			</tr>
		</thead>
		<tbody>

        <?php foreach ($course as $courses): ?>

			<tr>
				<td>
                    <a href="index.php?r=register-course/view&id=<?php echo $courses->id; ?>">
                        <h5><?php echo $courses->cod_id; ?></h5>
                    </a>
                </td>
                <td> <a href="index.php?r=register-course/view&id=<?php echo $courses->id; ?>">
                        <h5><?php echo $courses->name; ?></h5>
                    </a>
                </td>
                <td><?php echo number_format($courses->price); ?></td>
                <td>

                        <a href="index.php?r=register-course/addtocart&id=<?php echo $courses->id; ?>"
                           class="btn btn-success">
                            <i class="fa fa-shopping-basket"></i>

                        </a>

                </td>
			</tr>
        <?php endforeach; ?>
		</tbody>
	</table>
</div>


                <!-- display box -->


                <!-- display list -->




    <div class="text-center">
        <?php echo LinkPager::widget([
            'pagination' => $pagination,
        ]);
        ?>
    </div>
    </div>
</div>




