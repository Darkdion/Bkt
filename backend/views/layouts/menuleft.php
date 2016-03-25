<?php
use yii\helpers\Url;
use common\models\Student;

?>

<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

    <div class="menu_section">
        <h3>เมนูและเครื่องมือ</h3>
        <ul class="nav side-menu">


            <li>
                <a href="<?= Url::toRoute('payment/index') ?>"><i class="fa fa-money"></i> ชำระคอร์สเรียน
                    <span class="fa fa-chevron-circle-right"></span></a>

            </li>


            <li><a><i class="fa fa-share-alt-square"></i> การชำระและแจ้งชำระ <span
                        class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu" style="display: none">
                    <li>
                        <a href="<?= Url::to(['register-course/show']) ?>"><i class="fa fa-server">

                            </i> ข้อมูลลงทะเบียนทั้งหมด
                        </a>
                    </li>
                    <li>
                        <a href="<?= Url::to(['paynotify/index']) ?>">
                            <i class="fa fa-exclamation-circle"></i>
                            แสดงการแจ้งชำระ
                        </a>

                    </li>
                </ul>


            <li>
                <a href="<?= Url::to(['register-course/index']) ?>">
                    <i class="fa fa-book"></i> ลงทะเบียนเรียน <span class="fa fa-chevron-circle-right"></span></a>

            </li>
            <?php if (Yii::$app->user->can('Admin')): ?>

                <li><a><i class="fa fa-edit"></i> จัดการข้อมูลทั่วไป <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu" style="display: none">

                        <li><a href="<?= \yii\helpers\Url::to(['student/index']) ?>">จัดการข้อมูลสมาชิก <span
                                    class="label label-warning pull-right"><?= Student::find()->count() ?></span></a>

                        <li>
                        <li><a href="<?= \yii\helpers\Url::to(['personnel/index']) ?>">จัดการข้อมุลพนักงาน <span
                                    class="label label-info pull-right"><?= \common\models\Personnel::find()->count() ?></span></a>
                        <li><a href="<?= \yii\helpers\Url::to(['teacher/index']) ?>">จัดการข้อมูลอาจารย์ <span
                                    class="label label-success  pull-right"><?= \common\models\Teacher::find()->count() ?></span></a>
                        <li><a href="<?= \yii\helpers\Url::to(['school/index']) ?>">จัดการข้อมูลโรงเรียน <span
                                    class="label label-danger pull-right"><?= \common\models\School::find()->count() ?></span></a>
                        </li>
                        <li><a href="<?= \yii\helpers\Url::to(['manage-user/index']) ?>">จัดการข้อมูลผู้ใช้งาน <span
                                    class="label label-danger pull-right"><?= \common\models\User::find()->count() ?></span></a>
                        </li>


                    </ul>
                </li>
                <li>

                    <a href="<?= Url::to(['report/index']) ?>"><i class="fa fa-print"></i>
                        ออกรายงาน
                        <span class="fa fa-chevron-circle-right"></span>
                    </a>
                </li>
                <li><a><i class="fa fa-edge"></i> จัดการเว็บไซต์<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu" style="display: none">
                        <li><a href="<?= Url::to(['web-img/index']) ?>">จัดการภาพสไลค์ </a></li>
                        <li><a href="<?= Url::to(['web-news/index']) ?>">จัดการข้อมูลข่าว</a></li>
                        <li><a href="<?= Url::to(['newscategories/index']) ?>">จัดการประเภทข้อมูลข่าว</a></li>
                        <li>

                            <a href="<?= Url::to(['webcontact/index', 'id' => 1]) ?>">จัดการข้อมูลติดต่อ</a>
                        </li>


                    </ul>
                </li>
                <li><a><i class="fa fa-desktop"></i> จัดการข้อมูลคอรส์เรียน <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu" style="display: none">
                        <li><a href="<?= Url::to(['typecourse/index']) ?>">จัดการประเภทคอร์สเรียน <span
                                    class="label label-success pull-right">0</span></a>
                        </li>
                        <li><a href="<?= Url::to(['course/index']) ?>">จัดการคอร์สเรียน <span
                                    class="label label-success pull-right">0</span></a>
                        </li>


                    </ul>
                </li>


            <?php else: ?>
                <li>
                    <a href="<?= \yii\helpers\Url::to(['student/index']) ?>"><i class="fa fa-user-plus "></i>
                        เพิ่มข้อมูลนักเรียน
                        <span class="fa fa-chevron-circle-right"></span>
                    </a>
                </li>


            <?php endif; ?>


        </ul>
    </div>


</div>