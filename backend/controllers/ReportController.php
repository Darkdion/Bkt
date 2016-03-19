<?php

namespace backend\controllers;

use common\models\Personnel;
use common\models\RegisterCourse;
use common\models\Registerdetail;
use common\models\Student;
use kartik\mpdf\Pdf;

class ReportController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionStu()
    {

        $model = Student::find()->all();

        $content = $this->renderPartial('_student', [
            'model' => $model
        ]);

        // setup kartik\mpdf\Pdf component
        $pdf = new Pdf([
            // set to use core fonts only
            'mode' => Pdf::MODE_UTF8,
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
            'options' => ['title' => 'ออกรายงานข้อมูลนักเรียน'],
            // call mPDF methods on the fly
            'methods' => [
                //'SetHeader'=>['Krajee Report Header'],
//                'SetFooter' => ['{PAGENO}'],
            ]
        ]);

        // return the pdf output as per the destination setting
        return $pdf->render();
    }
    public function actionPer()
    {

        $model = Personnel::find()->all();

        $content = $this->renderPartial('_personnel', [
            'model' => $model
        ]);

        // setup kartik\mpdf\Pdf component
        $pdf = new Pdf([
            // set to use core fonts only
            'mode' => Pdf::MODE_UTF8,
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
            'options' => ['title' => 'ออกรายงานข้อมูลพนักงาน'],
            // call mPDF methods on the fly
            'methods' => [
                //'SetHeader'=>['Krajee Report Header'],
//                'SetFooter' => ['{PAGENO}'],
            ]
        ]);

        // return the pdf output as per the destination setting
        return $pdf->render();
    }

    public function actionToday()
    {
        $y = date('Y');
        $m = date('m');
        if (!empty($_POST)) {
            $y = $_POST['year'];
            $m = $_POST['month'];
        }
        $params = [':y' => $y, ':m' => $m];
        $conditions = "
      YEAR(pay_date) = :y
      AND MONTH(pay_date) = :m
      AND status = '1'
    ";
        $RegisterCourse = new RegisterCourse();
        $year_list = [];
        $month_list = [];

        // year list
        $start_year = date('Y');

        for ($i = ($start_year - 15); $i <= $start_year; $i++) {
            $year_list[$i] = $i;
        }

        // month list
        for ($i = 1; $i <= 12; $i++) {
            $month_list[$i] = $i;
        }

        $Registerdetail = Registerdetail::find()
            ->leftJoin('register_course', 'register_course.id = registerdetail.register_course_id')
            ->where($conditions, $params)
            ->orderBy('registerdetail.id DESC')
            ->all();

        return $this->render('today', [
            'n' => 1,
            'y' => ($y * 1),
            'm' => ($m * 1),
            'Registerdetail' => $Registerdetail,
            'RegisterCourse' => $RegisterCourse,
            'year_list' => $year_list,
            'month_list' => $month_list
        ]);
    }
//    public function actionTodayreport($id)
//    {
//
//           $Registerdetail=Registerdetail::findOne(['register_course_id'=>$id]);
//
//        $content = $this->renderPartial('_today', [
//            'n' => 1,
//
//            'Registerdetail' => $Registerdetail,
//
//
//        ]);
////
//       //  setup kartik\mpdf\Pdf component
//        $pdf = new Pdf([
//            // set to use core fonts only
//            'mode' => Pdf::MODE_UTF8,
//            // A4 paper format
//            'format' => Pdf::FORMAT_A4,
//            // portrait orientation
//            'orientation' => Pdf::ORIENT_PORTRAIT,
//            // stream to browser inline
//            'destination' => Pdf::DEST_BROWSER,
//            // your html content input
//            'content' => $content,
//
//            'marginTop' => 10,
//            'marginLeft' => 15,
//            'marginRight' => 15,
//            // format content from your own css file if needed or use the
//            // enhanced bootstrap css built by Krajee for mPDF formatting
//            'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
//            // any css to be embedded if required
//            'cssInline' => '.kv-heading-1{font-size:18px}',
//            // set mPDF properties on the fly
//            'options' => ['title' => 'ออกรายงาน'],
//            // call mPDF methods on the fly
//            'methods' => [
//                //'SetHeader'=>['Krajee Report Header'],
////                'SetFooter' => ['{PAGENO}'],
//            ]
//        ]);
////
//         //return the pdf output as per the destination setting
//        return $pdf->render();
//    }

    }
