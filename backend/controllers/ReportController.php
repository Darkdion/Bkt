<?php

namespace backend\controllers;

use common\models\Personnel;
use common\models\RegisterCourse;
use common\models\Registerdetail;
use common\models\Student;
use kartik\mpdf\Pdf;

use Yii;
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

    public function actionTodayreport(array $id)
    {


        $Registerdetail = Registerdetail::find()->where(['id' => $id])->orderBy('registerdetail.id DESC')->all();;

        $content = $this->renderPartial('_today', [
            'n' => 1,
            'Registerdetail' => $Registerdetail,


        ]);
//
        //  setup kartik\mpdf\Pdf component
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
            'options' => ['title' => 'ออกรายงาน'],
            // call mPDF methods on the fly
            'methods' => [
                //'SetHeader'=>['Krajee Report Header'],
//                'SetFooter' => ['{PAGENO}'],
            ]
        ]);
//
        //return the pdf output as per the destination setting
        return $pdf->render();
    }


    public function actionToday2(){
        $date1 = "";
        $date2 = "";
        if (Yii::$app->request->isPost) {
            $date1 = $_POST['date1'];
           $date2 = $_POST['date2'];
        }
      $sql=  "SELECT register_course.id,
register_course.student_id,
register_course.`status`,
register_course.pay_date,
registerdetail.register_course_id,
registerdetail.course_id,
registerdetail.price
FROM
register_course
INNER JOIN registerdetail ON registerdetail.register_course_id = register_course.id
WHERE pay_date>='$date1'
AND pay_date<='$date2' AND `status`= 1";

        try {
            $rawData = \Yii::$app->db->createCommand($sql)->queryAll();
        } catch (\yii\db\Exception $e) {
            throw new \yii\web\ConflictHttpException('sql error');
        }
        $dataProvider= new \yii\data\ArrayDataProvider([
            'allModels' => $rawData,
            'pagination' =>FALSE
        ]);
//        $Registerdetail = Registerdetail::find()
//            ->leftJoin('register_course', 'register_course.id = registerdetail.register_course_id')
//            ->where([between,'pay_date'=>$date1,$date2 ])
//            ->orderBy('registerdetail.id DESC')
//            ->all();
//       var_dump($Registerdetail);

return $this->render('today2',[
    'dataProvider'=>$dataProvider,
    'date1'=>$date1,
    'date2'=>$date2,
    'rawData'=>$rawData
]);
    }

    public  function actionToday2re(array $id)
    {

        $Registerdetail = Registerdetail::find()->where(['register_course_id' => $id])->orderBy('registerdetail.id DESC')->all();;


        $content = $this->renderPartial('_today2', [
            'n' => 1,
            'Registerdetail' => $Registerdetail,


        ]);
//
        //  setup kartik\mpdf\Pdf component
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
            'options' => ['title' => 'ออกรายงาน'],
            // call mPDF methods on the fly
            'methods' => [
                //'SetHeader'=>['Krajee Report Header'],
//                'SetFooter' => ['{PAGENO}'],
            ]
        ]);
//
        //return the pdf output as per the destination setting
        return $pdf->render();
    }
}
