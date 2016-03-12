<?php

namespace frontend\controllers;

use common\models\Student;
use Yii;
use common\models\User;

use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;


use yii\helpers\Html;
use yii\helpers\Json;

use common\models\Amphur;
use common\models\District;

use yii\base\Model;

class ProfileController extends Controller
{
    public $layout = 'profile'; // set this to profile,profile2

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index','update','student'],
                        'allow' => true,
                        'roles' => ['User'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }


    /**
     * Displays a single User model.
     * @param integer $id
     * @return mixed
     */


    public function actionIndex()
    {
        //  $modelStu=$this->findModelStu(Yii::$app->model2->user_id);
        // var_dump($modelStu);
        //$model2 = Student::find()->where(['user_id'=>Yii::$app->user->id])->one();
        return $this->render('index', [
          'model' => $this->findModel(Yii::$app->user->id),
          'model2' =>Student::find()->where(['user_id'=>Yii::$app->user->id])->one(),


        ]);
    }


    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate()
    {

        $model = $this->findModel(Yii::$app->user->id);
       // $model2=$this->findModel2(Yii::$app->user->id);

        $model->password = $model->password_hash;
        $model->confirm_password = $model->password_hash;
        $oldPass = $model->password_hash;

        $post = Yii::$app->request->post();

        if ( $model->load($post)&& Model::validateMultiple([$model])&& $model->validate() ){
            if($oldPass!==$model->password){
                $model->setPassword($model->password);
            }


            if($model->save()){
                Yii::$app->getSession()->setFlash('success', 'บันทึกเสร็จเรียบร้อย');
                return $this->redirect(['index']);
            }else{
                throw new NotFoundHttpException('พบข้อผิดพลาด!.');
            }

        } else {
            return $this->render('update', [
                'model' => $model,
              //  'model2' => $model2,


            ]);
        }
    }
    public function actionStudent()
    {
        $model2=Student::find()->where(['user_id'=>Yii::$app->user->id])->one();
        $amphur         = ArrayHelper::map($this->getAmphur($model2->province),'id','name');
        $district       = ArrayHelper::map($this->getDistrict($model2->amphur),'id','name');
        if ($model2->load(Yii::$app->request->post()) && $model2->save()) {

            Yii::$app->getSession()->setFlash('success', 'บันทึกเสร็จเรียบร้อย');
            return $this->redirect(['index']);


        } else {
            return $this->render('student', [
                'amphur'=> $amphur,

                'district' =>$district,

                'model2' => $model2,


            ]);
        }
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    protected function findModel2($id)
    {
        if (($model2 = Student::findOne($id)) !== null) {
            return $model2;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionGetAmphur() {
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];
            if ($parents != null) {
                $province_id = $parents[0];
                $out = $this->getAmphur($province_id);
                echo Json::encode(['output'=>$out, 'selected'=>'']);
                return;
            }
        }
        echo Json::encode(['output'=>'', 'selected'=>'']);
    }

    public function actionGetDistrict() {
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $ids = $_POST['depdrop_parents'];
            $province_id = empty($ids[0]) ? null : $ids[0];
            $amphur_id = empty($ids[1]) ? null : $ids[1];
            if ($province_id != null) {
                $data = $this->getDistrict($amphur_id);
                echo Json::encode(['output'=>$data, 'selected'=>'']);
                return;
            }
        }
        echo Json::encode(['output'=>'', 'selected'=>'']);
    }

    protected function getAmphur($id){
        $datas = Amphur::find()->where(['PROVINCE_ID'=>$id])->all();
        return $this->MapData($datas,'AMPHUR_ID','AMPHUR_NAME');
    }

    protected function getDistrict($id){
        $datas = District::find()->where(['AMPHUR_ID'=>$id])->all();
        return $this->MapData($datas,'DISTRICT_ID','DISTRICT_NAME');
    }

    protected function MapData($datas,$fieldId,$fieldName){
        $obj = [];
        foreach ($datas as $key => $value) {
            array_push($obj, ['id'=>$value->{$fieldId},'name'=>$value->{$fieldName}]);
        }
        return $obj;
    }
}
