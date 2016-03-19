<?php

namespace backend\controllers;

use common\models\Paynotify;
use common\models\RegisterCourse;
use yii\db\Expression;

class PaynotifyController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $model=Paynotify::find()->where(['status'=>1])
            ->orderBy('id DESC')
            ->all();

        return $this->render('index',[
            'model'=>$model,
        ]);
    }
    public function actionHistory()
    {
        $model=Paynotify::find()->where(['status'=>0])
            ->orderBy('id DESC')
            ->all();

        return $this->render('history',[
            'model'=>$model,
        ]);
    }
    public function actionFalse()
    {
        $model=Paynotify::find()->where(['status'=>2])
            ->orderBy('id DESC')
            ->all();

        return $this->render('false',[
            'model'=>$model,
        ]);
    }
    public function actionPaytrue($id) {
        $pay= Paynotify::findOne($id);
       // var_dump($pay->register_course_id);
        $pay->status = 0;
        if($pay->save()){
            $register =RegisterCourse::find()->where(['id'=>$pay->register_course_id])->all();
            foreach($register as $model){

            }
            $model->status=1;
            $model->pay_date=new Expression('NOW()');
            $model->save();
        }

//        return 'ok';


        return $this->redirect(['index']);
    }
    public function actionPayfalse($id) {
        $pay= Paynotify::findOne($id);
        $pay->status = 2;
        $pay->save();


        return $this->redirect(['index']);
    }




}
