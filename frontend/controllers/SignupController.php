<?php

namespace frontend\controllers;


use common\models\User;
use Yii;


use common\models\Amphur;
use common\models\District;
use common\models\Province;

use common\models\Student;
use common\models\StudentSearch;
use yii\base\Model;
use yii\base\Request;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\widgets\ActiveForm;

use kartik\growl\Growl;

class SignupController extends \yii\web\Controller

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


    public function actionIndex()
    {
        $model = new Student();
        $user = new User();

        $user->password = $user->password_hash;
        $user->confirm_password = $user->password_hash;
        $post = Yii::$app->request->post();
        //  $auth =Yii::$app

        if ($model->load($post) && $user->load($post) && Model::validateMultiple([$model, $user])) {
            $user->setPassword($user->password);
            //$user->status =0;
            $user->generateAuthKey();

            if ($user->save()) {
                $auth = Yii::$app->authManager;
                $authorRole = $auth->getRole('User');
                $auth->assign($authorRole, $user->getId());
                $model->user_id = $user->id;
                $model->save();
            }
            //return $this->render('email');
            //return $this->goHome();

            if (Yii::$app->getUser()->login($user)) {
                return $this->redirect(['/site/users']);
            }


        } else {
            return $this->render('index', [
                'model' => $model,
                'user' => $user,
                'amphur' => [],
                'district' => [],
            ]);
        }
    }

    public function actionEmail()
    {
        return $this->render('email');
    }

    protected function findModel($id)
    {
        if (($model = Student::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    protected function findModelUser($id)
    {
        if (($user = User::findOne($id)) !== null) {
            return $user;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }


//////เชื่อกับเบส อำเภอ จังหวัด ตำบล
    public function actionGetAmphur()
    {
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];
            if ($parents != null) {
                $province_id = $parents[0];
                $out = $this->getAmphur($province_id);
                echo Json::encode(['output' => $out, 'selected' => '']);
                return;
            }
        }
        echo Json::encode(['output' => '', 'selected' => '']);
    }

    public function actionGetDistrict()
    {
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $ids = $_POST['depdrop_parents'];
            $province_id = empty($ids[0]) ? null : $ids[0];
            $amphur_id = empty($ids[1]) ? null : $ids[1];
            if ($province_id != null) {
                $data = $this->getDistrict($amphur_id);
                echo Json::encode(['output' => $data, 'selected' => '']);
                return;
            }
        }
        echo Json::encode(['output' => '', 'selected' => '']);
    }

    protected function getAmphur($id)
    {
        $datas = Amphur::find()->where(['PROVINCE_ID' => $id])->all();
        return $this->MapData($datas, 'AMPHUR_ID', 'AMPHUR_NAME');
    }

    protected function getDistrict($id)
    {
        $datas = District::find()->where(['AMPHUR_ID' => $id])->all();
        return $this->MapData($datas, 'DISTRICT_ID', 'DISTRICT_NAME');
    }

    protected function MapData($datas, $fieldId, $fieldName)
    {
        $obj = [];
        foreach ($datas as $key => $value) {
            array_push($obj, ['id' => $value->{$fieldId}, 'name' => $value->{$fieldName}]);
        }
        return $obj;
    }

}
