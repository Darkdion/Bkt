<!-- <div id="colorPicker">
    <div class="wrapHead">
      <div class="miniColor">
        <div class="pickBox setBgColor"></div>
      </div>
    </div>
    <div class="barColor">
      <div class="wrapHead">
        <div class="codeColor"> <span class="h">Color <span class="txtColr">ME</span></span>
          <ul class="shadePanel">
            <li data-color="deepPink" class="deepPink">DeepPink</li>
            <li data-color="vividOrange" class="vividOrange">VividOrange</li>
            <li data-color="lightSeaGreen" class="lightSeaGreen">LightSeaGreen</li>
            <li data-color="darkOrchid" class="darkOrchid">DarkOrchid</li>
            <li data-color="lightCoral" class="lightCoral">LightCoral</li>
            <li data-color="aqua" class="aqua">Aqua</li>
            <li data-color="tomato" class="tomato">Tomato</li>
          </ul>
        </div>
        <div class="btnPNG"> <a href="javascript:closePicker();void(0);"><img alt="close color picker" src="assets/common/img/closeX.png"></a> </div>
      </div>
    </div>
  </div> -->
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->


    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
        <?php $i=0; foreach( $webimg as $img){ ?>

        <div class="item <?php if($i == 0){echo "active" ;} ?>">
            <img src="<?= Yii::getAlias('@back/photos/photoslider/') . $img->photos ?>" alt="">
            <div class="carousel-caption">
       <h3> <?php echo $img->name?> </h3>
            </div>
        </div>

        <?php $i++; }?>

        <ol class="carousel-indicators">
            <?php $a=0; foreach( $webimg as $img){ ?>
            <li data-target="#carousel-example-generic" data-slide-to="<?=$a?>" class="<?php if($i == 0){echo "active" ;} ?>"></li>
                <?php $a++; }?>
        </ol>

<!--        <div class="item">-->
<!--            <img src="../web/img/3.jpg " alt="">-->
<!--            <div class="carousel-caption">-->
<!--        </div>-->

    </div>

    <!-- Controls -->
    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>


<div id="navAnchor" class="navTab redraw">
    <ul class="wrapHead">
        <li class="active"><a href="#topic-whatMe"> เป้าหมายของเรา</a></li>
        <li><a href="#topic-differenceMe">ข่าวสาร</a></li>
        <li><a href="#topic-whyMe">อาจารย์ผู้สอน</a></li>
        <li><a href="#topic-moreMe">คอร์สเรียน</a></li>
    </ul>
</div>
<div id="navAnchor-bound" class="navTab box-invisible">
    <ul class="wrapHead">
        <li class="active">เป้าหมายของเรา</li>
        <li>ข่าวสาร</li>
        <li>>อาจารย์ผู้สอน </li>
        <li> คอร์สเรียน</li>
    </ul>
</div>
<article id="topic-whatMe" class="topic">
    <div id="home-whatMe" class="hidden-anchor"></div>
    <nav class="hBox setBgColor redraw">
        <h4>เป้าหมายของเรา</h4>
    </nav>
    <header class="headTopic">
        <h1><span class="txtColr">เป้าหมายของเรา</span></h1>
    </header>
    <div class="wrapper">
        <div class="content">
            <h3>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;เป็นโรงเรียนกวดวิชาชั้นนำของประเทศที่ได้รับการยอมรับจากนักเรียนและผู้ปกครองในด้านคุณภาพการเรียนการสอนและการบริการที่มีมาตราฐานพร้อมทั้งส่งเสริมด้านคุณธรรมจริยธรรม
                นักเรียนส่วนใหญ่สามารถนำความรู้ที่ได้ไปพัฒนาการเรียนของตนเอง ทำให้ผลสัมฤทธิ์ทางการเรียนสูงขึ้นได้ตามต้องการ</h3>

        </div>



    <div id="showReel" class="video-container" >
        <div class="wrapper">
          <h4>สวัสดี</h4>
        </div>
        <div class="transparentMC"></div>
    </div>
</article>
<article id="topic-differenceMe" class="topic grayTone">
    <nav class="hBox setBgColor redraw">
        <h4>ข่าวสาร </h4>
    </nav>
    <header class="headTopic">
        <h1>ข่าวสาร&nbsp;<span class="txtColr">ของบ้านครูติ๊กเตอร์</span></h1>
    </header>
    <div class="wrapper">

<br>
        <style>
            p{
                color: #fff;
            }
            #custom_carousel .item {

                color:#000;

                padding:20px 0;
            }
            #custom_carousel .controls{
                overflow-x: auto;
                overflow-y: hidden;
                padding:0;
                margin:0;
                white-space: nowrap;
                text-align: center;
                position: relative;
                background:#ddd
            }
            #custom_carousel .controls li {
                display: table-cell;
                width: 1%;
                max-width:90px
            }
            #custom_carousel .controls li.active {
                background-color:#eee;
                border-top:3px solid orange;
            }
            #custom_carousel .controls a small {
                overflow:hidden;
                display:block;
                font-size:10px;
                margin-top:5px;
                font-weight:bold

            }
            .btns{
                display: inline-block;
                padding: 6px 12px;
                margin-bottom: 0;
                font-size: 14px;
                font-weight: normal;
                line-height: 1.42857143;
                text-align: center;
                white-space: nowrap;
                vertical-align: middle;
                -ms-touch-action: manipulation;
                touch-action: manipulation;
                cursor: pointer;
                -webkit-user-select: none;
                -moz-user-select: none;
                -ms-user-select: none;
                user-select: none;
                background-image: none;
                border: 1px solid transparent;
                border-radius: 4px;
            }
            .btns1 {
                color: #fff;
                background-color: #5cb85c;
                border-color: #4cae4c;
            }
        </style>
                <div class="container-fluid">
                    <div id="custom_carousel" class="carousel slide" data-ride="carousel" data-interval="2500">
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner">
                            <?php $num=0; foreach($new as $news){?>
                            <div class="item  <?php if($num == 0){echo "active" ;} ?>">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-3" style="margin-top: 40px ;"><img  style="width: 200px;height: 150px;" src="<?= Yii::getAlias('@back/photos/news/') . $news->photos ?>" class="img-responsive"></div>
                                        <div class="col-md-9">
                                            <h2><?php echo $news->name?></h2>
                                            <p><?php echo substr($news->detail,0,150).'...';?></p>

                                            <div class="text-right"><a href="" class="btns btns1 btn-sm">อ่านเพิ่มเติม</a></div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                                <?php $num++; }?>
                            <!-- End Item -->
                        </div>
                        <!-- End Carousel Inner -->
                        <div class="table-responsive">


                        <div class="controls">
                            <ul class="nav">
                                <?php $n=0; foreach( $new as $row){ ?>
                                <li data-target="#custom_carousel" data-slide-to="<?=$n ?>" class="<?php if($n == 0){echo "active" ;} ?>"><a href="#" ><img style="width: 50px;height: 50px;" src="<?= Yii::getAlias('@back/photos/news/') . $row->photos ?>"><small><?php echo $row->name?></small></a></li>

                                    <?php $n++; }?>
                            </ul>
                        </div>
                    </div>
                    </div>
                    <!-- End Carousel -->
        </div>
        </div>

</article>
<article id="topic-whyMe" class="topic">
    <div id="home-whyMe" class="hidden-anchor"></div>
    <nav class="hBox setBgColor redraw">
        <h4>อาจาร์ผู้สอน</h4>
    </nav>
    <header class="headTopic">
        <h1>อาจาร์ผู้สอน&nbsp;<span class="txtColr"></span></h1>
    </header>
    <div class="wrapper">






        <div id="jquery-script-menu">
            <div class="jquery-script-center">


        </div>
        <h2 style="margin-top:40px;  text-align:center;">รู้จักอาจารย์ของเรา</h2>
            <br>
        <div class="w-gallery">
            <section id="responsiveGallery-container" class="responsiveGallery-container">
                <a class="responsiveGallery-btn responsiveGallery-btn_prev" href="javascript:void(0);"></a>
                <a class="responsiveGallery-btn responsiveGallery-btn_next" href="javascript:void(0);"></a>
                <ul class="responsiveGallery-wrapper">
                    <?php $t=0; foreach($teacher as $teachers){?>
                    <li class="responsiveGallery-item"> <a href="#" class="responsivGallery-link"><img src="3D/assets/pics/2.jpg"  alt="" class="responsivGallery-pic"></a>
                        <div class="w-responsivGallery-info">
                            <p class="responsivGallery-name"><br></p>
                            <p class="responsivGallery-position"><?php echo $teachers->fullName?></p>
                        </div>
                    </li>
                        <?php $t++; }?>
                </ul>
            </section>
        </div>
        <script type="text/javascript">

            var _gaq = _gaq || [];
            _gaq.push(['_setAccount', 'UA-36251023-1']);
            _gaq.push(['_setDomainName', 'jqueryscript.net']);
            _gaq.push(['_trackPageview']);

            (function() {
                var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
                ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
                var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
            })();

        </script>

    </div>
    <script type="text/javascript">
        $(function () {
            $('.responsiveGallery-wrapper').responsiveGallery({
                animatDuration: 400, //动画时长 单位 ms
                $btn_prev: $('.responsiveGallery-btn_prev'),
                $btn_next: $('.responsiveGallery-btn_next')
            });
        });

    </script>
    <script type="text/javascript">

        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-36251023-1']);
        _gaq.push(['_setDomainName', 'jqueryscript.net']);
        _gaq.push(['_trackPageview']);

        (function() {
            var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
        })();

    </script>
</article>
<article id="topic-moreMe" class="topic grayTone">
    <nav class="hBox setBgColor redraw">
        <h4>คอร์สเรียนของเรา</h4>
    </nav>
    <header class="headTopic">
        <h1><span class="txtColr">คอร์สเรียน</span>&nbsp;เรียนแบบกันเอง</h1>
    </header>
    <div class="wrapper">
        <div class="content">
            <h3>คุณทำเอง ME จึงให้ได้มากกว่า</h3>
            <p><span class="txtColr">ME</span> ให้คุณทำธุรกรรมด้วยตนเองได้ทุกที่ทุกเวลา</p>
            <p><span class="txtColr">ME</span> จึงไม่มีสาขาและพนักงานมากมายเหมือนธนาคารทั่วไป และสามารถคืนประโยชน์จากการลดต้นทุนกลับไปให้คุณได้มากกว่าธนาคารอื่นๆ ในรูปแบบดอกเบี้ยสูงจากผลิตภัณฑ์เงินฝาก ME</p>
            <div class="group-link"> <a class="btn btn-Interest" href="calculator/index.html">
                    <div class="iconSprite"></div>
                    คำนวณดอกเบี้ย</a> <a class="btn" href="product/index.html">รู้จักผลิตภัณฑ์ของ&nbsp;ME</a> </div>
        </div>
    </div>
    <img class="pic01" src="assetss/common/img/hand.png" alt=""> </article>