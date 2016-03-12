<?php

namespace backend\controllers;
session_start();
use common\models\Course;
use common\models\CourseSearch;

use common\models\RegisterCourse;
use common\models\Registerdetail;
use Yii;
use yii\data\Pagination;
use yii\db\Expression;
use yii\web\NotFoundHttpException;
use yii\web\Session;

use kartik\growl\Growl;
use yii\helpers\Html;


class CourseRegisterController extends \yii\web\Controller
{
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
        if (!\Yii::$app->user->isGuest) {
            return $this->render('index', [

                'course' => $course->all(),
                'pagination' => $pagination,
                'sort' => $sort
            ]);
        }

      return $this->goHome();
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

        return $this->render('//dd/AddToCart', [
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

    $cart =$session->get('coursecart');

    $register_course = new RegisterCourse();
    if(!empty($_POST)){

        $register_course->student_id = $_POST['register_course']['student_id'];
        $register_course->status = '0';
        $register_course->created_at= new Expression('NOW()');

        if($register_course->save()){
            foreach($cart as $c){
                $registerdetail = new Registerdetail();
                $registerdetail->register_course_id=$register_course->id;
                $registerdetail->course_id=$c['id'];
                $registerdetail->price=$c['price'];
                $registerdetail->save();

            }

            $session->set('coursecart',null);
        }


    }

    return $this->render('checkout',[
            'register_course'=>$register_course,
            'n' => 1,
            'cart' => $cart,
            'sumQty' => 0,
            'sumPrice' => 0,

        ]);
}

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
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
