<link href="assetss/faq/css/faq.css" rel="stylesheet" type="text/css"  />
<link href="assetss/faq/css/faq-detail.css" rel="stylesheet" type="text/css"  />
<?php
////บันทึก การเข้าดู
$view=$news->viewtotail+1;
$news->viewtotail=$view;
$news->save();

function thai_date($time){
    global $thai_day_arr,$thai_month_arr;
    // $thai_date_return=" ".$thai_day_arr=array("อาทิตย์","จันทร์","อังคาร","พุธ","พฤหัสบดี","ศุกร์","เสาร์")[date("w",$time)];
    $thai_date_return= "วันที่ ".date("j",$time);
    $thai_date_return.=" ".$thai_month_arr=array(
            "","ม.ค.","ก.พ.","มี.ค.","เม.ย", "พ.ค.",
            "มิ.ย.", "ก.ค.", "ส.ค.","ก.ย.", "ต.ค.",
            "พ.ค", "ธ.ค."
        )[date("n",$time)];
    $thai_date_return.= " ".(date("Y",$time)+543);
    $thai_date_return.= " เวลา ".date("H:i",$time)." น.";
    return $thai_date_return;
}
?>
<section id="main">
    <header class="hMain">
        <h3 class="wrapHead"> <i class="glyphicon glyphicon-list-alt fa-2x"></i> รายละเอียดข่าวสาร</h3>
    </header>
    <div class="container">
        <h1 class="text-center txtColr"><?php  echo  $news->name?></h1>
        <div class="text-center">
        <img  src="<?= Yii::getAlias('@back/photos/news/') . $news->photos ?>" class="img-responsive thumbnail"> </p>
        </div>
        <div class="well-lg">
                <h3><b><?php echo $news->detail;?></b></h3>
        </div>
         <div class="pull-right">
             <i class="glyphicon glyphicon-eye-open "> <?php echo number_format($news->viewtotail)?></i>
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             <i class="glyphicon glyphicon-calendar "> <?php echo thai_date($news->created_at)?></i>

         </div>
<div class="pull-left">
    <a href="<?=\yii\helpers\Url::to(['site/index'])?>" class="btns btn-danger btn-sm"><i class=""></i> ย้อนกลับ</a>
</div>
    </div>
</section>
<div class="clearAll"></div>