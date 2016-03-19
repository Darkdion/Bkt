<?php

namespace backend\controllers;

use common\models\Payments;
use common\models\RegisterCourse;
use common\models\RegisterCourseSearch;
use common\models\Registerdetail;
use yii\data\ActiveDataProvider;


use  Yii;
use yii\db\Expression;
use yii\helpers\Html;
use kartik\mpdf\Pdf;

class PaymentController extends \yii\web\Controller
{




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
            'SUMPrice' => 0,
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



    return $this->render('index',[
        'num'=>1,
        'Regdetail'=>[],
        'Regcoruse'=>[],
        'sumPrice'=> 0.00
    ]);
    }
}

    public function actionBill($id) {

        // get your HTML raw content without any layouts or scripts
       // $model = RegisterCourse::find()->where(['id'=>$id])->one();
        $model =RegisterCourse::findOne($id);
        $modeldetail =Registerdetail::findOne($id);
        $model->status=1;
        $model->save();
       // $model->paydate =new Expression('NOW()');
//        if($model->save()){
//            $pay= new Payments();
//            $pay->pay_date= new Expression('NOW()');
//            $pay->student_id=$model->student_id;
//            $pay->register_course_id =$model->id;
//           // $pay->personnel_per_id = '1';
//            $pay->status=$model->status;
//            $pay->save();
//
//        }

        $content = $this->renderPartial('_billSuccess',[
            'model'=>$model,
            'modeldetail'=>$modeldetail,
            'sumtotall'=>0,
        ]);
        // setup kartik\mpdf\Pdf component
        $pdf = new Pdf([
            // set to use core fonts only
            'mode' =>  Pdf::MODE_UTF8,
            // A4 paper format
            'format' => Pdf::FORMAT_A4,
            // portrait orientation
            'orientation' => Pdf::ORIENT_PORTRAIT,
            // stream to browser inline
            'destination' => Pdf::DEST_BROWSER,
            // your html content input
            'content' => $content,

            'marginTop' => 10,
            'marginLeft' => 15,
            'marginRight' => 15,
            // format content from your own css file if needed or use the
            // enhanced bootstrap css built by Krajee for mPDF formatting
            'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
            // any css to be embedded if required
            'cssInline' => '.kv-heading-1{font-size:18px}',
            // set mPDF properties on the fly
            'options' => ['title' => 'Bill Bankrutik'],
            // call mPDF methods on the fly
            'methods' => [
                //'SetHeader'=>['Krajee Report Header'],
                //'SetFooter'=>['{PAGENO}'],
            ]
        ]);

        // return the pdf output as per the destination setting
        return $pdf->render();
    }

}
