<?php
namespace common\models;


class Allfuction extends \yii\db\ActiveRecord
{

   public function thai_date($time){
        global $thai_day_arr,$thai_month_arr;
        //$thai_date_return="วัน ".$thai_day_arr=array("อาทิตย์","จันทร์","อังคาร","พุธ","พฤหัสบดี","ศุกร์","เสาร์")[date("w",$time)];
        $thai_date_return= "".date("j",$time);
        $thai_date_return.=" ".$thai_month_arr=array(
                "","ม.ค.","ก.พ.","มี.ค.","เมษายน", "พฤษภาคม",
                "มิถุนายน", "กรกฎาคม", "สิงหาคม","กันยายน", "ตุลาคม",
                "พฤศจิกายน", "ธันวาคม"
            )[date("n",$time)];
        $thai_date_return.= " ".(date("Y",$time)+543);
        //  $thai_date_return.= "  ".date("H:i",$time)." น.";
        return $thai_date_return;
    }


}