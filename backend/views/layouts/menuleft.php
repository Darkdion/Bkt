<?php
use yii\helpers\Url;
use common\models\Student;
?>

<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

    <div class="menu_section">
        <h3>เมนูและเครื่องมือ</h3>
        <ul class="nav side-menu">
            <li><a href="<?= Url::to(['site/index'])?>"><i class="fa fa-home"></i> หน้าหลัก </a>


            </li>
            <li><a><i class="fa fa-edit"></i> จัดการข้อมูลทั่วไป <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu" style="display: none">
                    <li><a href="<?= \yii\helpers\Url::to(['student/index'])?>">จัดการข้อมุลสมาชิก <span class="label label-success pull-right"><?=Student::find()->count()?></span></a>

                    <li><a href="<?= \yii\helpers\Url::to(['teacher/index'])?>">จัดการข้อมูลอาจารย์ <span class="label label-success  pull-right"><?=\common\models\Teacher::find()->count()?></span></a>
                    <li><a href="<?= \yii\helpers\Url::to(['school/index'])?>">จัดการข้อมูลโรงเรียน <span class="label label-danger pull-right"><?=\common\models\School::find()->count()?></span></a>
                    </li>

                </ul>
            </li>
            <li><a><i class="fa fa-book"></i> ลงทะเบียนเรียน <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu" style="display: none">
                    <li><a href="<?=Url::to(['register-course/index']) ?>">ลงคอร์สเรียน <span class="label label-success pull-right">0</span></a>
                    </li>


                </ul>
            </li>
            <li><a><i class="fa fa-desktop"></i> จัดการข้อมูลคอรส์เรียน <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu" style="display: none">
                    <li><a href="<?=Url::to(['typecourse/index']) ?>">จัดการประเภทคอร์สเรียน <span class="label label-success pull-right">0</span></a>
                    </li>
                    <li><a href="<?=Url::to(['course/index']) ?>">จัดการคอร์สเรียน <span class="label label-success pull-right">0</span></a>
                    </li>


                </ul>
            </li>
            <li><a><i class="fa fa-money"></i> จัดการข้อมูลการชำระ<span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu" style="display: none">
                    <li><a href="#">การชำระใบเสร็จรับเงิน </a>
                    </li>
                    <li><a href="#">การชำระทั้งหมด  <span class="label label-success pull-right">0</span></a>
                    </li>

                </ul>
            </li>
            <li><a><i class="fa fa-bar-chart-o"></i> ใบเสร็จรับเงิน <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu" style="display: none">
                    <li><a href="#">ป้อนใบเสร็จรับเงิน</a>
                    </li>
                    <li><a href="#">ยกเลิกใบเสร็จรับเงิน</a>
                    </li>
                    <li><a href="#">ค้นหาข้อมูลใบเสร็จรับเงิน</a>
                    </li>

                </ul>
            </li>
            <li><a><i class="fa fa-paypal"></i> แสดงการแจ้งชำระ <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu" style="display: none">
                    <li><a href="#">การแจ้งชำระทั้งหมด</a>
                    </li>


                </ul>
            </li>
            <li><a><i class="fa fa-print"></i> ออกรายงาน <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu" style="display: none">
                    <li><a href="#">ออกรายงานสมาชิกทั้งหมด</a>
                    </li>
                    <li><a href="#">ออกรายงานอาจารย์</a>
                    </li>
                    <li><a href="#">ออกรายงานใบเสร็จ</a>
                    </li>
                    <li><a href="#">ออกรายงานรายวัน</a>
                    </li>
                    <li><a href="#">ออกรายงานรายวัน เดือน ปี</a>
                    </li>

                </ul>
            </li>
        </ul>
    </div>
    <div class="menu_section">
        <h3>รายงานอื่นๆ</h3>
        <ul class="nav side-menu">
            <li><a><i class="fa fa-bug"></i> ใบเช็คชื่อ <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu" style="display: none">
                    <li><a href="e_commerce.html">E-commerce</a>

                </ul>
            </li>

            <li><a><i class="fa fa-laptop"></i> ข้อมูลนักเรียน <span class="label label-success pull-right">0</span></a>
            </li>
            <li><a><i class="fa fa-shopping-cart color" ></i> ชำระคอร์เรียน <span class="label label-danger pull-right">0</span></a>
            </li>
        </ul>
    </div>

</div>