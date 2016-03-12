<?php

namespace frontend\controllers;
use common\models\Student;
use Yii;
use common\models\RegisterCourse;

class HistoryController extends \yii\web\Controller
{
    public $layout = 'user\main';
    public function actionIndex()
    {
        $student =Student::find()->where(['user_id'=>Yii::$app->user->id])->one();

        $Register = RegisterCourse::find()
            ->where(['student_id'=>$student->id])
            ->orderBy('id DESC')
            ->all();

      //  var_dump($Register);
//
        return $this->render('index',[
            'Num'=>1,
            'Sumprice'=>0,
            'Register'=>$Register,


        ]);
    }

}
