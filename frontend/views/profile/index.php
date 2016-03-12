<?php
Yii::$app->layout='user';
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = 'การตั้งค่าบัญชีผู้ใช้ทั่วไป';

//$this->params['breadcrumbs'][] = $this->title;
//$this->title = 'แก้ไขโปรไฟล์';
//$this->params['breadcrumbs'][] = ['label' => 'โปรไฟล์', 'url' => ['index']];
//$this->params['breadcrumbs'][] = Yii::t('app', 'แก้ไขโปรไฟล์');
?>

<div class="user-view  box panel panel-body"">
<?php
function thai_date($time){
    global $thai_day_arr,$thai_month_arr;
    $thai_date_return="วัน ".$thai_day_arr=array("อาทิตย์","จันทร์","อังคาร","พุธ","พฤหัสบดี","ศุกร์","เสาร์")[date("w",$time)];
    $thai_date_return.= " ที่ ".date("j",$time);
    $thai_date_return.=" เดือน".$thai_month_arr=array(
            "","มกราคม","กุมภาพันธ์","มีนาคม","เมษายน", "พฤษภาคม",
            "มิถุนายน", "กรกฎาคม", "สิงหาคม","กันยายน", "ตุลาคม",
            "พฤศจิกายน", "ธันวาคม"
        )[date("n",$time)];
    $thai_date_return.= " พ.ศ.".(date("Y",$time)+543);
    //  $thai_date_return.= "  ".date("H:i",$time)." น.";
    return $thai_date_return;
}

function Card($var)
{
    $srt[0] = substr($var, 0, 1);
    $srt[1] = substr($var, 1, 4);
    $srt[2] = substr($var, 5, 5);
    $srt[3] = substr($var, 10, 2);
    $srt[4] = substr($var, 12, 1);
    return $srt[0]."-".$srt[1]."-".$srt[2]."-".$srt[3]."-".$srt[4];
}
//echo Card("1234567891011");
?>



<div class="row">
    <div class="col-lg-12">

        <div class="portlet portlet-default">
            <div class="portlet-body">
                <ul id="userTab" class="nav nav-tabs">

                    <li class="active" ><a  href="#profile-settings" data-toggle="tab">โปรไฟล์</a>
                    </li>
                </ul>
                <div id="userTabContent" class="tab-content">

                    <div class="tab-pane fade in active" id="profile-settings">

                        <div class="row">
                            <div class="col-sm-3">
                                <ul id="userSettings" class="nav nav-pills nav-stacked">

                                    <li class="active"><a   href="#profilePicture" data-toggle="tab"><i class="fa fa-users fa-fw"></i> ข้อมูลส่วนตัว</a>
                                    </li>
                                    <li><a href="#changePassword" data-toggle="tab"><i class="fa fa-sign-in fa-fw"></i> ข้อมูลใช้งาน</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-sm-9">
                                <div id="userSettingsContent" class="tab-content">

                                    <div class="tab-pane fade in active" id="profilePicture">
                                        <div class="table-responsive">
                                        	<table class="table table-hover">
                                        		<thead>
                                        			<tr>
                                        				<th></th>
                                        			</tr>
                                        		</thead>
                                        		<tbody>
                                        			<tr>
                                        				<td><strong><i class="fa fa-user  fa-fw"> </i> ชื่อ-นามสกุล </strong> </td>
                                                        <td><?=$model2->fullName?></td>

                                                    <tr>
                                                        <td><strong><i class="fa fa-credit-card  fa-fw"> </i> เลขบัตรประจำตัวประชาชน </strong> </td>
                                                        <td><?= Card($model2->identification)?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong><i class="fa fa-graduation-cap fa-fw"> </i> ระดับการศึกษา </strong> </td>
                                                        <td><?=$model2->education?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong><i class="fa fa-flag-checkered fa-fw"> </i> สถานศึกษา </strong> </td>
                                                        <td><?=$model2->schoolName?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong><i class="fa fa-thumbs-up fa-fw"> </i> เพศ </strong> </td>
                                                        <td><?=$model2->sex == 1 ? '<b class="fa fa-male text-danger fa-2x"></b>' : '<b class="fa fa-female text-success fa-2x"></b>'?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong><i class="fa fa-thumb-tack fa-fw"> </i> ที่อยู่ </strong> </td>
                                                        <td><?=$model2->address.'ต.'.$model2->districtName.'อ.'.$model2->amphurName.'จ.'.$model2->provinceName?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong><i class="fa fa-phone fa-fw"> </i> เบอร์โทร </strong> </td>
                                                        <td><?=$model2->phone ?></td>
                                                    </tr>
                                        		</tbody>
                                        	</table>
                                        </div>



                                    </div>
                                    <div class="tab-pane fade in" id="changePassword">
                                        <?= DetailView::widget([
                                            'model' => $model,
                                            'attributes' => [   ],
                                        ]) ?>
                                        <div class="table-responsive">
                                        	<table class="table table-hover">
                                        		<thead>
                                        			<tr>
                                        				<th></th>
                                        			</tr>
                                        		</thead>
                                        		<tbody>
                                        			<tr>
                                                        <td><strong><i class="fa fa-sign-in  fa-fw"> </i>ชื่อผู้ใช้งาน </strong> </td>
                                                        <td><?=$model->username?></td>
                                        			</tr>
                                                    <tr>
                                                        <td><strong><i class="fa fa-lock fa-fw"> </i>รหัสผ่าน </strong> </td>
                                                        <td class="text text-danger">********</td>
                                                    </tr>
                                                    <tr>
                                                        <td><strong><i class="fa fa-retweet fa-fw"> </i>สถานะการใช้งาน </strong> </td>
                                                        <td ><?= $model->status==0 ? '<span class="label-danger label">ปิดใช้งาน</span>':'<span class="label-success label">เปิดใช้งาน</span>' ?></td>
                                                    </tr>

                                        		</tbody>
                                        	</table>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- /.portlet-body -->
        </div>
        <!-- /.portlet -->


    </div>
    <!-- /.col-lg-12 -->
</div>