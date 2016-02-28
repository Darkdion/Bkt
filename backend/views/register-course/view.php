<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Course */

$this->title = 'แสดงรายละเอียดรหัสที่ :'.$model->id;
$this->params['breadcrumbs'][] = ['label' => 'จัดการคอร์สเรียน', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;


?>
<div class="course-view">



              <div class="x_panel">
                  <div class="x_title">
                      <h2><i class="fa fa-bell"></i> วิชาเรียน : <?=$model->name?>  </h2>

                      <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                <table class="table table-hover table-responsive">

                	<tbody>
                       <tr>
                           <th></th>
                           <td>
                           <div class="text-center">
                               <a href="<?=$model->photoViewer?>" class="thumbnail image-link" style="height: 300px;
    width: 300px;">
                                   <img src="<?=$model->photoViewer?>" alt="">
                               </a>
                           </div>
                           </td>
                       </tr>
                        <tr>
                            <th class="text-left">รายละเอียด :</th>
                            <td><?=$model->detail?> </td>
                        </tr>

                        <tr>
                            <th class="text-left">อาจารย์ผู้สอน:</th>
                            <td> <span class="label label-success"> <?=$model->teacher_id?>  </span></td>
                        </tr>
                        <tr>
                            <th class="text-left">ราคา:</th>
                            <td><?= number_format($model->price) ?> ฿. </td>
                        </tr>


                        <tr>
                            <th class="text-left">วันที่เริ่ม-วันที่สิ้นสุด:</th>
                            <td><?= $model->date_s.' - '.$model->date_c?></td>
                        </tr>
                	</tbody>
                </table>








            <div class="text-center">

                <a href="<?= \yii\helpers\Url::toRoute('register-course/index')?>" class="btn btn-danger btn-raised"> <i class="faa-pulse  wa animated fa fa-ban"></i> ปิดหน้านี้</a>
            </div>
          </div>
