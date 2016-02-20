<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Course */

$this->title = 'แสดงรายละเอียดรหัสที่ :'.$model->id;
$this->params['breadcrumbs'][] = ['label' => 'จัดการคอร์สเรียน', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
use backend\assets\ViewBoxAsset;
ViewBoxAsset::register($this);

?>
<div class="course-view">


    <div class="card card-bordered ">
        <div class="card-head">
            <div class="tools">
                <div class="btn-group">
                    <div class="btn-group">

                    </div>
                    <a class="btn btn-icon-toggle btn-refresh"><i class="md md-refresh"></i></a>

                </div>
            </div>

        </div><!--end .card-head -->
        <div class="card-body style-default-bright">


            <div class="col-md-6">
                <a href="<?=$model->photoViewer?>" class="thumbnail image-link">
                    <img src="<?=$model->photoViewer?>" alt="">
                </a>
            </div>
            <div class="col-md-6">
                <table class="table table-hover table-responsive">

                	<tbody>
                		<tr>
                            <th class="text-left">ชื่อ :</th>
                			<td><?=$model->name?> </td>
                		</tr>
                        <tr>
                            <th class="text-left">รายละเอียด :</th>
                            <td><?=$model->detail?> </td>
                        </tr>
                        <tr>
                            <th class="text-left">อาจารย์ผู้สอน:</th>
                            <td><?=$model->teacher_id?> </td>
                        </tr>
                        <tr>
                            <th class="text-left">ราคา:</th>
                            <td><?= $model->price?> ฿. </td>
                        </tr>
                        <tr>
                            <th class="text-left">วันที่เริ่ม-วันที่สิ้นสุด:</th>
                            <td><?= $model->date_s.' - '.$model->date_c?></td>
                        </tr>
                	</tbody>
                </table>



            <div class="text-center">
                <button type="button" class="btn btn-default btn-raised" data-dismiss="modal"> <i class="faa-pulse  wa animated fa fa-ban"></i> ปิดหน้านี้</button>


            </div>


        </div></div></div>
