<?php

namespace frontend\controllers;

use common\models\Course;
use common\models\RegisterCourse;
use common\models\Registerdetail;
use common\models\Student;
use kartik\widgets\Growl;
use yii\bootstrap\Html;
use yii\data\Pagination;
use yii\db\Expression;
use yii\db\Query;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;
use yii\web\Session;

use Yii;
use kartik\mpdf\Pdf;

class RegisterCourseController extends \yii\web\Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'addshop','view'],
                'rules' => [


                    [
                        'actions' => ['index', 'addshop', 'users','view'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public $layout = 'user\main';

    public function actionIndex($sort = 'box')
    {

        $totalCount = Course::find();
        if (!empty($_POST['search'])) {
            $search = '%' . $_POST['search'] . '%';

            $totalCount = $totalCount->where('name LIKE(:search)', [
                ':search' => $search
            ]);
        }
        $totalCount = $totalCount->count();
        $pagination = new Pagination([
            'totalCount' => $totalCount,
            'pageSize' => 6
        ]);
        $course = Course::find()
            ->orderBy('id DESC')
            ->offset($pagination->offset)
            ->limit($pagination->limit);

        if (!empty($_POST['search'])) {
            $search = '%' . $_POST['search'] . '%';

            $course = $course
                ->where('name LIKE(:search) OR price LIKE(:search) OR 	typecourse_id LIKE(:search) OR cod_id LIKE(:search)', [
                    ':search' => $search
                ]);
        }

        return $this->render('index', [

            'course' => $course->all(),
            'pagination' => $pagination,
            'sort' => $sort
        ]);
    }

    public function actionAddshop($id = null)
    {
        $product = Course::findOne($id);
        $session = new Session();
        $session->open();
        $cart = [];

        if (!empty($session->get('coursecart'))) {
            $cart = $session->get('coursecart');
        }
        if (!empty($_POST)) {
            $data = [
                'id' => $product->id,
                'code' => $product->cod_id,
                'name' => $product->name,
                'price' => $product->price,

            ];

            $check_array = 0;
            foreach ($cart as $c) {
                if ($c['id'] == $product->id) {
                    $check_array = 1;
                }

            }

            if ($check_array == 0) {
                $cart[count($cart)] = $data;
                $session->set('coursecart', $cart);
            } else {

                //\Yii::$app->session->setFlash('danger', 'มีรายวิชานี้อยู่');
                Yii::$app->getSession()->setFlash('alert', [
                    'type' => 'danger',
                    'duration' => 1200,
                    'icon' => ' glyphicon glyphicon-th-large',
                    'title' => Yii::t('app', Html::encode('แจ้งเตือน !')),
                    'message' => Yii::t('app', Html::encode('มีรายวิชานี้อยู่ในรายการแล้ว !')),
                    'positonY' => 'top',
                    'positonX' => 'right'
                ]);

            }
        }

        return $this->render('//register-course/addShop', [
            'product' => $product,
            'cart' => $cart,
            'n' => 1,
            'sumQty' => 0,
            'sumPrice' => 0
        ]);


    }

    public function actionShopremove($index, $id)
    {
        $session = new Session();
        $session->open();
        $_SESSION['num'] = 10;
        $cart = $session['coursecart'];

        if (count($cart) > 0) {
            $cart[$index] = null;
            $newCart = [];

            foreach ($cart as $c) {
                if ($c != null) {
                    $newCart[] = $c;
                }
            }
            Yii::$app->getSession()->setFlash('alert', [
                'type' => 'success',
                'duration' => 1200,
                'icon' => ' glyphicon glyphicon-th-large',
                'title' => Yii::t('app', Html::encode('แจ้งเตือน !')),
                'message' => Yii::t('app', Html::encode('ลบรายวิชาเรียบร้อยแล้ว !')),
                'positonY' => 'top',
                'positonX' => 'right'
            ]);
//            \Yii::$app->session->setFlash('danger', 'ลบ');
            $session->set('coursecart', $newCart);

            return $this->redirect(['addshop', 'id' => $id]);
        }
    }

    public function actionCheckout()
    {
        $session = new Session();
        $session->open();
        if (!empty($session->get('coursecart'))) {
            $cart = $session->get('coursecart');
        } else {
            Yii::$app->getSession()->setFlash('alert', [
                'type' => Growl::TYPE_WARNING,
                'duration' => 1800,
                'icon' => 'fa fa-remove fa-2x',
                'title' => Yii::t('app', Html::encode('เกิดข้อผิดพลาด !'), ['class' => 'text-center']),
                'message' => Yii::t('app', Html::encode('กรุณาเลือกคอร์สเรียนก่อน')),
                'showSeparator' => true,
                'delay' => 1,
                'pluginOptions' => [
                    'showProgressbar' => true,
                    'placement' => [
                        'from' => 'top',
                        'align' => 'right',
                    ]
                ]
            ]);
            return $this->redirect(['addshop']);
        }


        $RegisterCourse = new RegisterCourse();
        $student = Student::find()->where(['user_id' => Yii::$app->user->id])->one();


        //  var_dump($_POST);
        //  var_dump($cart);
        if (!empty($_POST)) {
            // save registercourse
            //$RegisterCourse->register_date= new Expression('NOW()');
            $RegisterCourse->status = '0';
            $RegisterCourse->student_id = $student->id;

            if ($RegisterCourse->save()) {
                // loop read data from session to database

                foreach ($cart as $c) {
                    $billOrderDetail = new Registerdetail();
                    $billOrderDetail->register_course_id = $RegisterCourse->id;
                    $billOrderDetail->course_id = $c['id'];
                    $billOrderDetail->price = $c['price'];

                    $billOrderDetail->save();
                }
//
                // clear session
                $session->set('coursecart', null);

                return $this->redirect(['registerdetail']);
            }
        }
////
//        return $this->render('//register-course/Checkout', [
//            'n' => 1,
//            'cart' => $cart,
//            'sumQty' => 0,
//            'sumPrice' => 0,
//            'RegisterCourse' => $RegisterCourse
//        ]);
    }

    public function actionRegisterdetail()
    {
        return $this->render('registerdetail', [
            'num' => 1
        ]);
    }

    public function actionDetail($id)
    {
        $register = RegisterCourse::findOne($id);
        $registerdetail = Registerdetail::find()
            ->where(['register_course_id' => $id])
            ->orderBy('id DESC')
            ->all();
        // var_dump($registerdetail);
        return $this->renderAjax('detail', [
            'n' => 1,       //ตัวนับหน้าตาราง
            'sumtotall' => 0, //ตัวแปลราคารวม
            'register' => $register,
            'registerdetail' => $registerdetail,
        ]);


    }


    public function actionBill($id)
    {
        //ลูป ตาราง คอร์ส
        $models = RegisterCourse::findOne($id);
        $Registerdetail = Registerdetail::findOne($id);

        $content = $this->renderPartial('bill', [
            'Num' => 1,
            'models' => $models,
            'Registerdetail' => $Registerdetail,
            'SUMPrice' => 0,
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
            'cssInline' => '
            table {
        border-collapse: collapse;
    }

    table, th, td {
        border: 1px solid black;
        font-size:16pt;
    }
              body{
                font-family:"thaisaban", "sans-serif";
                font-size:16px;
              }
                    p{
                    font-size:10px;
                    line-height: 4px;
                    }
                    #wrapper{

                    width: 50mm;
                    height: 30mm;
                    margin: 0px;
                }
                #header{
                height: 25mm;
                }
                #header p{
                    margin-bottom: 0px;
                }
                .row1{
                height: 50%
                margin: 0px;
                }
                .row2{
                height: 50%
                margin: 0px;
                background-color: yellow;
                }


            ',
            // set mPDF properties on the fly
            'options' => [
                'title' => 'ใบเสร็จ',
            ],
            // call mPDF methods on the fly
            'methods' => [
                //'SetHeader' => ['รายละเอียดการประเมินปัญหาแรกรับ'],
                //'SetFooter' => ['{PAGENO}'],
            ]
        ]);

        // return the pdf output as per the destination setting
        return $pdf->render();
    }


    public function actionDelete($id)
    {
        $user = $this->findRegister($id);
        //var_dump($user->id);
        $register = Registerdetail::find()->where(['register_course_id' => $user->id])->all();
        //$profile = Registerdetail::findOne(['register_course_id'=>$user->id]);
        foreach ($register as $pro) {

            $pro->delete();
        }
        $user->delete();



          return $this->redirect(['register-course/registerdetail']);
        //return $this->redirect(['index']);
    }

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }
    protected function findRegister($id)
    {
        if (($model = RegisterCourse::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    protected function findModel($id)
    {
        if (($model = Course::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }



}
