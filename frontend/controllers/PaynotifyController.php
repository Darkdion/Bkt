<?php

namespace frontend\controllers;

use common\models\Paynotify;
use common\models\RegisterCourse;
use common\models\Registerdetail;
use common\models\Student;

class PaynotifyController extends \yii\web\Controller
{
    public $layout = 'user\main';


    public function actionIndex()
    {
        $student = Student::find()
            ->where(['user_id' => \Yii::$app->user->id])
            ->all();
        foreach ($student as $stu):
        endforeach;
        echo $stu->fullName;
        $model=Paynotify::find()
            ->where(['student_id'=>$stu->id])
            ->orderBy('id DESC')
            ->all();

        return $this->render('index',[
            'model'=>$model,
        ]);
    }

    public function actionCreate($id)

    {
        ///////////////
        $student = Student::find()
            ->where(['user_id' => \Yii::$app->user->id])
            ->all();
        foreach ($student as $stu):
        endforeach;
        ////////////
        // var_dump($stu->id);

        $register = RegisterCourse::findOne($id);
        $registerDe=Registerdetail::find()->where(['register_course_id'=>$register->id])->all();
        foreach ($registerDe as $registerDes):
        endforeach;
 //var_dump($registerDes->id);
        $model = new Paynotify();
        if ($model->load(\Yii::$app->request->post()) && $model->validate()) {
            $model->student_id = $stu->id; // เก็บว่าใครแจ้ง
            $model->status = 1;       //ให้สถานะ เท่ากับ 1 แจ้งแล้ว
            $model->photos = $model->upload($model,'photos');
            $model->register_course_id = $register->id; // เก็บเลขที่ใบเสร็จ

            $model->save();

            return $this->redirect(['register-course/registerdetail']);
        } else {
            return $this->render('create', [
                'model' => $model,
                'register' => $register,
            ]);
        }


    }
    public function actionUpdate($id)
    {
        $student = Student::find()
            ->where(['user_id' => \Yii::$app->user->id])
            ->all();
        foreach ($student as $stu):
        endforeach;
        $register = RegisterCourse::findOne($id);

        $models = Paynotify::find()->where(['register_course_id' => $id])->all();
        foreach ($models as $model):
        endforeach;
        // var_dump($model->id);
        if ($model->load(\Yii::$app->request->post()) && $model->validate()) {
            $model->student_id = $stu->id; // เก็บว่าใครแจ้ง
            $model->status = 1;       //ให้สถานะ เท่ากับ 1 แจ้งแล้ว
            $model->photos = $model->upload($model, 'photos');
            $model->register_course_id = $register->id; // เก็บเลขที่ใบเสร็จ

            $model->save();
            return $this->redirect(['register-course/registerdetail']);
        } else {
            return $this->render('update', [
                'model' => $model,
                'register' => $register,
            ]);

        }
    }

}
