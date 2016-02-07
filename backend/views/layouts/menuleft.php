<div id="menubar" class="menubar-inverse ">
    <div class="menubar-fixed-panel">
        <div>
            <a class="btn btn-icon-toggle btn-default menubar-toggle" data-toggle="menubar" href="javascript:void(0);">
                <i class="fa fa-bars"></i>
            </a>
        </div>
        <div class="expanded">
            <a href="<?= \yii\helpers\Url::to('site/index')?>">
                <span class="text-lg text-bold text-primary "></span>
            </a>
        </div>
    </div>
    <div class="menubar-scroll-panel">

        <!-- BEGIN MAIN MENU -->
        <ul id="main-menu" class="gui-controls">

            <!-- BEGIN DASHBOARD -->
            <li>
                <a href="<?= Yii::$app->homeUrl?>" class="active">
                    <div class="gui-icon"><i class="md md-home"></i></div>
                    <span class="title">หน้าหลัก</span>
                </a>
            </li><!--end /menu-li -->
            <!-- END DASHBOARD -->

            <!-- BEGIN EMAIL -->
            <li class="gui-folder">
                <a >
                    <div class="gui-icon"><i class="md md-web"></i></div>
                    <span class="title">จัดการเว็บไซต์</span>
                </a>
                <!--start submenu -->
                <ul>
                    <li><a href="<?=\yii\helpers\Url::to('?r=web-img/index')?>" ><span class="title">จัดการรูปภาพ</span></a></li>

                    <li class="gui-folder">
                        <a href="javascript:void(0);">
                            <span class="title">จัดการข่าว</span>
                        </a>
                        <!--start submenu -->
                        <ul>
                            <li><a href="<?=\yii\helpers\Url::to('?r=newscategories/index')?>" ><span class="title">จัดการหมวดหมู่</span></a></li>
                            <li><a href="<?=\yii\helpers\Url::to('?r=web-news/index')?>" ><span class="title">จัดการข่าวและประชาสัมพันธ์</span></a></li>

                        </ul><!--end /submenu -->
                    </li><!--end /submenu-li -->
                    <li><a href="<?=\yii\helpers\Url::to('?r=web-course/index')?>" ><span class="title">จัดการความรู้ทั่วไปและคอร์สเรียน</span></a></li>
                    <li><a href="<?=\yii\helpers\Url::to('?r=web-contact/index')?>" ><span class="title">จัดการที่อยู่และติดต่อเกี่ยวกับเรา</span></a></li>

                </ul><!--end /submenu -->
            </li><!--end /menu-li -->
            <!-- END EMAIL -->

            <!-- BEGIN DASHBOARD -->
            <li class="gui-folder">
                <a  >
                    <div class="gui-icon"><i class="md md-book"></i></div>
                    <span class="title">จัดการคอร์สเรียน</span>
                </a>
                <ul>
                    <li><a href="<?=\yii\helpers\Url::to('?r=typecourse/index') ?>" ><span class="title">จัดการประเภทคอร์สเรียน</span></a></li>
                    <li><a href="../../html/tables/dynamic.html" ><span class="title">Dynamic Tables</span></a></li>
                    <li><a href="../../html/tables/responsive.html" ><span class="title">Responsive Table</span></a></li>
                </ul><!--end /submenu -->
            </li><!--end /menu-li -->

            <li class="gui-folder">
                <a>
                    <div class="gui-icon"><i class="fa fa-users"></i></div>
                    <span class="title">จัดการข้อมูลทั่วไป</span>
                </a>
                <!--start submenu -->
                <ul>
                    <li><a href="../../html/tables/static.html" ><span class="title">Static Tables</span></a></li>
                    <li><a href="../../html/tables/dynamic.html" ><span class="title">Dynamic Tables</span></a></li>
                    <li><a href="../../html/tables/responsive.html" ><span class="title">Responsive Table</span></a></li>
                </ul><!--end /submenu -->
            </li><!--end /menu-li -->
            <!-- END TABLES -->
            <li class="gui-folder">
                <a>
                    <div class="gui-icon"><i class="fa fa-print"></i></div>
                    <span class="title">จัดการออกรายงาน</span>
                </a>
                <!--start submenu -->
                <ul>
                    <li><a href="../../html/tables/static.html" ><span class="title">Static Tables</span></a></li>
                    <li><a href="../../html/tables/dynamic.html" ><span class="title">Dynamic Tables</span></a></li>
                    <li><a href="../../html/tables/responsive.html" ><span class="title">Responsive Table</span></a></li>
                </ul><!--end /submenu -->
            </li>


        </ul><!--end .main-menu -->
        <!-- END MAIN MENU -->

        <div class="menubar-foot-panel">
            <small class="no-linebreak hidden-folded">
                <span class="opacity-75">Copyright &copy; 2014</span> <strong>CodeCovers</strong>
            </small>
        </div>
    </div><!--end .menubar-scroll-panel-->
</div><!--end #menubar-->