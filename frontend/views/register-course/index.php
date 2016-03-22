<?php
use yii\widgets\ActiveForm;
use yii\widgets\LinkPager;
use yii\web\Session;

$session = new Session();
$session->open();

$this->title = 'ลงทะเบียนคอร์สเรียน ';
//$this->params['breadcrumbs'][] = ['label' => 'จัดการคอร์สเรียน', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>

<?php
$countItemsInCart = 0;


?>
<?php if(!empty($session->get('coursecart'))):?>

    <?php  $countItemsInCart = count($session->get('coursecart'));?>

    <div style="position: absolute;z-index: 1500;right: 0px;top: 80px;position: fixed;">
        <a href="index.php?r=register-course/addshop" class="btn btn-lg btn-default">
            <i class="glyphicon glyphicon-book"></i>
            รายการคอร์สเรียน
                    <span class="badge">

                      <?php echo $countItemsInCart; ?>
                    </span>
        </a>
    </div>

<?php else:?>
    <div style="position: absolute;z-index: 1500;right: 0px;top: 80px;position: fixed;">
        <a href="index.php?r=register-course/addshop" class="btn btn-lg btn-default">
            <i class="fa fa-bookmark-o"></i>
            ไม่มีรายการคอร์สเรียน
                    <span class="badge">

                      0
                    </span>
        </a>
    </div>
<?php endif; ?>
<div class="pull-left ">
    <a href="index.php?r=register-course/index&sort=box" class="btn btn-primary">
        <i class="glyphicon glyphicon-th"></i>
    </a>
    <a href="index.php?r=register-course/index&sort=list" class="btn btn-dark-blue">
        <i class="glyphicon glyphicon-th-list"></i>
    </a>
</div>
<div class="text-center panel panel-body">
    <?php ActiveForm::begin([
        'action' => 'index.php?r=register-course/index',
        'options' => [
            'class' => 'form-inline',
            'name' => 'formProduct'
        ]
    ]); ?>
    <div class="input-group">
    <input type="text" name="search" class="form-control" placeholder="ค้นหาชื่อและรหัสคอร์ส..."/>
     <span class="input-group-btn">
    <a class="btn btn-primary  " onclick="document.formProduct.submit()">
        <i class="glyphicon glyphicon-search"></i> ค้นหา
    </a>
           </span>
    </div>
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

                <?php if($sort == 'list'):?>
                <thead>
                <tr>
                    <th>รหัสคอร์สเรียน</th>
                    <th>ชื่อคอร์สเรียน</th>
                    <th>ราคา</th>
                    <th>เลือก</th>
                </tr>
                </thead>
                <tbody>
<?php endif;?>
                <?php foreach ($course as $courses): ?>
                    <?php if ($sort == 'box'): ?>

                    <div class="col-sm-4 ">
                        <div class="panel panel-primary ">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">

                                        <i class="fa fa-book fa-5x"></i>
                                        <span class="badge bg-green"><?php echo $courses->cod_id; ?> </span>
                                    </div>
                                    <div class="col-xs-9 text-right">

                                        <div class="text-center " style="font-size: 12pt">  <?php echo $courses->name; ?></div><br>
                                       <div class=""><strong>เพียงราคา</strong> <span class="badge bg-green"><?php echo number_format($courses->price); ?> ฿</span></div>
                                    </div>
                                </div>
                            </div>

                            <div class="panel-footer">
                                <a href="index.php?r=register-course/view&id=<?php echo $courses->id; ?>">
                                <span class="pull-left btn btn-green">ดูรายละเอียด</span>
                                </a>
                                <a href="index.php?r=register-course/addshop&id=<?php echo $courses->id; ?>"> <span class="pull-right btn btn-warning">
                                  <i class="fa fa-shopping-cart"></i>
                                        ลงทะเบียน
                                    </span>
                                </a>
                                <div class="clearfix"></div>
                            </div>

                        </div>
                    </div>
                        <?php else: ?>

                                        <tr >
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

                                                <a href="index.php?r=register-course/addshop&id=<?php echo $courses->id; ?>"
                                                   class="btn btn-success">
                                                    <i class="fa fa-shopping-basket"></i>

                                                </a>

                                            </td>
                                        </tr>
                    <?php endif; ?>
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




