<?php

namespace backend\controllers;

use common\models\Course;
use common\models\CourseSearch;
use common\models\RegisterCart;
use common\models\Registerdetail;
use Yii;
use common\models\RegisterCourse;
use common\models\RegisterCourseSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

use yii\data\Pagination;
use yii\db\Expression;
use yii\web\Session;

use kartik\growl\Growl;
use yii\helpers\Html;
USE yii\filters\VerbFilter;

/**
 * RegisterCourseController implements the CRUD actions for RegisterCourse model.
 */
class RegisterCourseController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }



    public function actionIndex($sort ='box')
    {

        $totalCount = Course::find();
        if(!empty($_POST['search'])){
            $search='%'.$_POST['search'].'%';

            $totalCount = $totalCount->where('name LIKE(:search)', [
                ':search' => $search
            ]);
        }
        $totalCount = $totalCount->count();
        $pagination = new Pagination([
            'totalCount' => $totalCount,
            'pageSize' =>4
        ]);
        $course = Course::find()
            ->orderBy('id DESC')
            ->offset($pagination->offset)
            ->limit($pagination->limit);

        if (!empty($_POST['search'])) {
            $search = '%'.$_POST['search'].'%';

            $course = $course
                ->where('name LIKE(:search) OR price LIKE(:search) OR cod_id LIKE(:search)', [
                    ':search' => $search
                ]);
        }

        return $this->render('index', [

            'course' => $course->all(),
            'pagination' => $pagination,
            'sort' => $sort
        ]);
    }


    public function actionAddtocart($id=null)
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
            foreach($cart as $c){
                if($c['id'] == $product->id){
                    $check_array = 1;
                }

            }

            if($check_array == 0){
                $cart[count($cart)] = $data;
                $session->set('coursecart', $cart);
            }else{

               Yii::$app->session->setFlash('danger', 'มีรายวิชานี้อยู่');


            }
        }

        return $this->render('//register-course/AddToCart', [
            'product' => $product,
            'cart' => $cart,
            'n' => 1,
            'sumQty' => 0,
            'sumPrice' => 0
        ]);


    }







    public function actionCartremove($index, $id) {
        $session = new Session();
        $session->open();
        $_SESSION['num']=10;
        $cart = $session['coursecart'];

        if (count($cart) > 0) {
            $cart[$index] = null;
            $newCart = [];

            foreach ($cart as $c) {
                if ($c != null) {
                    $newCart[] = $c;
                }
            }

            $session->set('coursecart', $newCart);

            return $this->redirect(['addtocart', 'id' => $id]);
        }
    }
    public function actionCheckout()
    {
        $session = new Session();
        $session->open();
        if (!empty($session->get('coursecart'))) {
            $cart = $session->get('coursecart');
        }


        $RegisterCourse = new RegisterCourse();
        var_dump($cart);
        if (!empty($_POST)) {
            // save bill order
           // $RegisterCourse->created_at = new Expression('NOW()');
            $RegisterCourse->status = '0';
            $RegisterCourse->student_id = $_POST['RegisterCourse']['student_id'];

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

                return $this->redirect(['checkoutsuccess']);
            }
        }
//
        return $this->render('//register-course/Checkout', [
            'n' => 1,
            'cart' => $cart,
            'sumQty' => 0,
            'sumPrice' => 0,
            'RegisterCourse' => $RegisterCourse
        ]);
    }
    public function actionCheckoutsuccess() {
        return $this->render('//register-course/CheckoutSuccess');
    }
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }




protected function findModel($id)
    {
        if (($model = RegisterCourse::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
