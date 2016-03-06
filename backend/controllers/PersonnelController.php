<?php

namespace backend\controllers;

use common\models\UserSeach;
use Yii;
use common\models\Personnel;
use common\models\PersonnelSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;



use yii\base\Model;
use kartik\growl\Growl;
use yii\helpers\Html;
use yii\helpers\Json;
use common\models\Amphur;
use common\models\District;
use common\models\Province;
use common\models\User;
use yii\helpers\ArrayHelper;



class PersonnelController extends Controller
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

    /**
     * Lists all Personnel models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PersonnelSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

                $user =new User();



        return $this->render('index', [

            'user'=>$user,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Personnel model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Personnel model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Personnel();

        $user = new User();

        $user->password=$user->password_hash;
        $user->confirm_password=$user->password_hash;
        $post=Yii::$app->request->post();
        //  $auth =Yii::$app

        if ($model->load($post)&&$user->load($post) && Model::validateMultiple([$model,$user])) {
            $user->setPassword($user->password);
            $user->generateAuthKey();
            if($user->save()){
                $auth = Yii::$app->authManager;
                $authorRole = $auth->getRole('Manager');
                $auth->assign($authorRole, $user->getId());
                $model->user_id =$user->id;
                $model->save();
            }
            Yii::$app->getSession()->setFlash('alert', [
                'type' => Growl::TYPE_SUCCESS,
                'duration' => 1700,
                'icon' => 'fa fa-floppy-o fa-2x',
                'title' => Yii::t('app', Html::encode('บันทึกข้อมูล'), ['class' => 'text-center']),
                'message' => Yii::t('app',Html::encode('บันทึกข้อมูลข้อมูลสมาชิกเรียบร้อย !')),
                'showSeparator' => true,
                'delay' => 1500,
                'pluginOptions' => [
                    'showProgressbar' => true,
                    'placement' => [
                        'from' => 'top',
                        'align' => 'right',
                    ]
                ]
            ]);
            return $this->redirect(['view', 'id' => $model->per_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'user'=>$user,
                'amphur'=> [],
                'district' =>[],
            ]);
        }
    }

    /**
     * Updates an existing Personnel model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $user = $this->findModelUser($model->user_id);
        $user->password = $user->password_hash;
        $user->confirm_password = $user->password_hash;
        $oldPass = $user->password_hash;
        $post = Yii::$app->request->post();
        $amphur         = ArrayHelper::map($this->getAmphur($model->province),'id','name');
        $district       = ArrayHelper::map($this->getDistrict($model->amphur),'id','name');
        if ($model->load($post)&& $user->load($post)&& Model::validateMultiple([$model,$user]) ){
            if($oldPass!==$user->password){
                $user->setPassword($user->password);
            }
            if($user->save()){
                $auth = Yii::$app->authManager;
                $authorRole = $auth->getRole('Manager');
                $auth->assign($authorRole, $user->getId());
                $model->user_id =$user->id;
                $model->save();
            }
            Yii::$app->getSession()->setFlash('alert', [
                'type' => Growl::TYPE_INFO,
                'duration' => 1700,
                'icon' => 'fa fa-users fa-2x',
                'title' => Yii::t('app', Html::encode('ปรับปรุง'), ['class' => 'text-center']),
                'message' => Yii::t('app',Html::encode('ปรับปรุงข้อมูลสมาชิกเรียบร้อย !')),
                'showSeparator' => true,
                'delay' => 1500,
                'pluginOptions' => [
                    'showProgressbar' => true,
                    'placement' => [
                        'from' => 'top',
                        'align' => 'right',
                    ]
                ]
            ]);
            return $this->redirect(['view', 'id' => $model->per_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'user'=>$user,
                'amphur'=> $amphur,
                'district' =>$district,
            ]);
        }
    }

    /**
     * Deletes an existing Personnel model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id,$user_id)
    {
        $this->findModel($id)->delete();
  $this->findModelUser($user_id)->delete();
        return $this->redirect(['index']);
    }


    /**
     * Finds the Personnel model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Personnel the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Personnel::findOne($id)) !== null) {
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
