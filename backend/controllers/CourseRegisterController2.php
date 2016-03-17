<?php

namespace backend\controllers;
session_start();
use common\models\Course;
use common\models\CourseSearch;
use Yii;

use yii\data\Pagination;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;
use yii\web\Session;


class CourseRegisterController extends \yii\web\Controller
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index','Addtocart'],
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
                ->where('name LIKE(:search) OR price LIKE(:search)', [
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
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }


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
        $cart[count($cart)] = $data;
        $session->set('coursecart', $cart);

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
public function actionItems()
{

      //$cart =Course::find()->orderBy('id')->all();
    return $this->render('items'
       // 'cart'=>$cart
    );
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
