<?php

namespace backend\controllers;

use kartik\widgets\Growl;
use Yii;
use common\models\Course;
use common\models\CourseSearch;
use yii\helpers\Html;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CourseController implements the CRUD actions for Course model.
 */
class CourseController extends Controller
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
     * Lists all Course models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CourseSearch();
        $model = new Course();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->pagination->pageSize=6;
        $dataProvider->sort->defaultOrder=['id'=>'DESC'];
        return $this->render('index', [
            'model' => $model,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Course model.
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
     * Creates a new Course model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Course();
        $model->attributes = \Yii::$app->request->post('Course');

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

            $model->photos=$model->upload($model,'photos');
            $model->save();
            Yii::$app->getSession()->setFlash('alert', [
                'type' => Growl::TYPE_SUCCESS,
                'duration' => 1700,
                'icon' => 'fa fa-users fa-2x',
                'title' => Yii::t('app', Html::encode('บันทึก'), ['class' => 'text-center']),
                'message' => Yii::t('app',Html::encode('บันทึกข้อมูลคอร์สเรียนเรียบร้อย !')),
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

            return $this->redirect(['index', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Course model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

            $model->photos=$model->upload($model,'photos');
            $model->save();
            Yii::$app->getSession()->setFlash('alert', [
                'type' => Growl::TYPE_INFO,
                'duration' => 1700,
                'icon' => 'fa fa-edit fa-2x',
                'title' => Yii::t('app', Html::encode('ปรับปรุง'), ['class' => 'text-center']),
                'message' => Yii::t('app',Html::encode('ปรับปรุงข้อมูลคอร์สเรียนเรียบร้อย !')),
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
            return $this->redirect(['index', 'id' => $model->id]);
        } else {

            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Course model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Course model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Course the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Course::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
