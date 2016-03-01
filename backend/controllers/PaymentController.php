<?php

namespace backend\controllers;

use common\models\RegisterCourse;
use common\models\RegisterCourseSearch;
use common\models\Registerdetail;
use yii\data\ActiveDataProvider;


use  Yii;
use yii\helpers\Html;
class PaymentController extends \yii\web\Controller
{

    public function actionPay()
    {
        $Unrequited= RegisterCourse::find()->where(['status'=>0])->all();
        $paid = RegisterCourse::find()->where(['status'=>1])->all();

        return $this->render('pay',[
            'num'=>1,
            'Unrequited'=>$Unrequited,
            'paid'=>$paid,
        ]);
    }


public function actionIndex()
{
//    $totalCount = RegisterCourse::find();
//SELECT * FROM `registerdetail` where `register_course_id` = 000001
//
    $totalPrice = 0.00;
    //รับค่าจาก ค้นหา
    if (!empty($_POST['search'])) {
        $search = $_POST['search'];
        //ค้นหาข้อมูล จากตาราง Registerdetail
        $Regdetail = Registerdetail::find()->where(['register_course_id' => $search])->all();
        $Regcoruse = RegisterCourse::find()->where(['id' => $search])->all();
//var_dump($Regdetail);
        //ลูปราคารวม
//        foreach($Regdetail as $r ){
//            $totalPrice += ($r->price);
//        }
        //ส่งค่าออกไป หน้า ชำระ
        return $this->render('index',[
            'num'=>1,
            'Regdetail'=>$Regdetail,
            //'totalPrice'=>$totalPrice,
            'Regcoruse'=>$Regcoruse,
           'sumPrice'=> 0.00
        ]);
    }else{

        //ถ้าไม่มีข้อมูล
        Yii::$app->getSession()->setFlash('message', [
            'type' => 'danger',
            'duration' => 2000,
            'icon' => ' fa fa-exclamation-circle',
            'title' => Yii::t('app', Html::encode('เกิดข้อมผิดพลาด !')),
            'message' => Yii::t('app',Html::encode('ไมพบเลขที่ใบเสร็จ หรือ ข้อมูลไม่ถูกต้อง')),
            'positonY' => 'top',
            'positonX' => 'right', ]);


    }
    return $this->render('index',[
        'num'=>1,
        'Regdetail'=>[],
        'Regcoruse'=>[],
        'sumPrice'=> 0.00
    ]);

}


}
