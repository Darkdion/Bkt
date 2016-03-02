<?php
use common\models\RegisterCourse;
?>



<div class="x_panel">
  <div class="x_title">
    <h2><i class="fa fa-credit-card-alt"></i> รายการชำระ </h2>

    <div class="clearfix"></div>
  </div>
  <div class="x_content">

    <div class="container">

      <!-------->
      <div id="content">
        <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
          <li class="active"><a href="#red" data-toggle="tab">ยังไม่ชำระ  <span class=" label label-danger pull-right "> <?=RegisterCourse::find()->where(['status'=>0])->count() ?></span></a></li>
          <li><a href="#orange" data-toggle="tab">ชำระแล้ว  <span class=" label label-success pull-right "> <?=RegisterCourse::find()->where(['status'=>1])->count() ?></span></a></li>
          <li><a href="#yellow" data-toggle="tab">การชำระทั้งหมด </a></li>

        </ul>
        <div id="my-tab-content" class="tab-content">
          <div class="tab-pane active" id="red">
            <br>
            <h4>  <i class="fa fa-credit-card"> </i> รายการยังไม่ชำระ</h4>
            <div class="table-responsive">
              <?php if(!empty($Unrequited)): ?>
              <table class="table table-hover table-bordered">
                <thead>
                <tr>
                  <th>no</th>
                  <th>ชื่อ-นามสกุล</th>
                  <th>สร้างเมือวันที่</th>
                  <th>สถานะ</th>

                </tr>
                </thead>
                <tbody>

                <?php foreach($Unrequited as $model):?>
                <tr>
                  <td><?=$num ++ ?></td>
                  <td><?=$model->fullName; ?></td>

                  <td><?= thai_date($model->created_at); ?></td>
                  <td>
                    <?= $model->status==0?' <span class="label label-danger">ยังไม่ชำระ</span>':'<i class="label label-success"></i> <span class="text-success">ชำระแล้ว</span>';?>

                  </td>
                </tr>
                </tbody>
                <?php endforeach;?>
                <?php else:?>

                  <h2 class="title text-center">ไม่มีข้อมูลยังไม่ขำระ</h2>
                <?php endif; ?>
              </table>
            </div>
          </div>
          <div class="tab-pane" id="orange">
            <br>
            <h4>  <i class="fa fa-credit-card"> </i> รายการชำระแล้ว</h4>
            <?php if(!empty($paid)): ?>
            <div class="table-responsive">
              <table class="table table-hover table-bordered">
                <thead>
                <tr>
                  <th>no</th>
                  <th>ชื่อ-นามสกุล</th>
                  <th>สร้างเมือวันที่</th>
                  <th>สถานะ</th>

                </tr>
                </thead>
                <tbody>

                <?php foreach($paid as $model):?>
                <tr>
                  <td><?=$num ++ ?></td>
                  <td><?=$model->fullName; ?></td>

                  <td><?= Yii::$app->thaiFormatter->asDate($model->created_at, 'medium') ?></td>
                  <td>
                    <?= $model->status==0?' <span class="label label-danger">ยังไม่ชำระ</span>':' <span class="label label-success">ชำระแล้ว</span>';?>

                  </td>
                </tr>
                </tbody>
                <?php endforeach;?>
                <?php else:?>

                  <h2 class="title text-center">ไม่พบข้อมูล</h2>
                <?php endif; ?>
              </table>
            </div>

          <div class="tab-pane" id="yellow">
            <h4>  <i class="fa fa-credit-card"> </i> รายการทั้งหมด</h4>
            <?= \kartik\grid\GridView::widget([
                'dataProvider' => $dataProvider,
             //   'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'id',
                    'fullName',
                    //'status',
                    [
                        'label'=>'สถานะ',
                        'format'=>'html',
                        'value'=>function($model){
                          return $model->status==0?' <span class="label label-danger">ยังไม่ชำระ</span>':'<span class="label label-success">ชำระแล้ว</span>';
                        }
                    ],
                    'created_at:date',
                    'updated_at:date',

                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>
          </div>

        </div>
      </div>


  </div>
</div>

<div class="hidden">
  <?php
  function thai_date($time){
    global $thai_day_arr,$thai_month_arr;
    $thai_date_return="วัน".$thai_day_arr=array("อาทิตย์","จันทร์","อังคาร","พุธ","พฤหัสบดี","ศุกร์","เสาร์")[date("w",$time)];
    $thai_date_return.= "ที่ ".date("j",$time);
    $thai_date_return.=" เดือน".$thai_month_arr=array(
            "","มกราคม","กุมภาพันธ์","มีนาคม","เมษายน", "พฤษภาคม",
            "มิถุนายน", "กรกฎาคม", "สิงหาคม","กันยายน", "ตุลาคม",
            "พฤศจิกายน", "ธันวาคม"
        )[date("n",$time)];
    $thai_date_return.= " พ.ศ.".(date("Y",$time)+543);
    // $thai_date_return.= " ".date("H:i",$time)." น.";
    return $thai_date_return;
  }
  ?>
  <?php

  echo \yii\bootstrap\Tabs::widget([
    'items' => [
      [
        'label' => 'One',
        'content' => 'Anim pariatur cliche...',
        'active' => true,
        'class'=>'hidden',
      ],

    ],
  ]);
  ?>

</div>
