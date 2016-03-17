<?php

namespace common\models;

use Yii;

use yii\behaviors\TimestampBehavior;
use yii\helpers\Html;
use yii\web\UploadedFile;

/**
 * This is the model class for table "paynotify".
 *
 * @property integer $id
 * @property integer $student_id
 * @property string $date_pay
 * @property double $price_pay
 * @property string $file
 * @property integer $status
 * @property integer $creared_at
 * @property integer $updated_at
 *
 * @property Student $student
 */
class Paynotify extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public  $foder='paynotify';

    public  $foder2='/web/paynotify';


    public static function tableName()
    {
        return 'paynotify';
    }
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [

            [['student_id', 'status','register_course_id', 'created_at', 'updated_at','price_pay','date_pay'], 'safe'],

         //ตัวแปรเก็บภาพ
            [['photos'], 'file',
                'skipOnEmpty' => true,
                'extensions' => 'png,jpg'
            ]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'student_id' => 'Student ID',
            'date_pay' => 'วันที่ชำระ',
            'price_pay' => 'จำนวนเงิน',
            'photos' => 'หลักฐานการชำระ',
            'status' => 'สถานะ',
            'created_at' => 'Creared At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudent()
    {
        return $this->hasOne(Student::className(), ['id' => 'student_id']);
    }


    public function upload($model,$attribute)
    {
        $photos  = UploadedFile::getInstance($model, $attribute);

        $path = $this->getUploadPath();

        if ($this->validate() && $photos !== null) {

            $fileName = md5($photos->baseName.time()) . '.' . $photos->extension;
            //$fileName = $photo->baseName . '.' . $photo->extension;
            if($photos->saveAs($path.$fileName) ){


                return $fileName;
            }

        }
        return $model->isNewRecord ? false : $model->getOldAttribute($attribute);
    }


    public function getUploadPath(){
        return Yii::getAlias('@webroot').'/'.$this->foder.'/';
    }



    public function getUploadUrl(){
        return Yii::getAlias('@web').'/'.$this->foder.'/';
    }
    public function getPhotosViewer(){
        $photos = $this->photos ? @explode(',',$this->photos) : [];
        $img = '';
        foreach ($photos as  $photo) {
            $img.= ' '.Html::img($this->getUploadUrl().$photo,['class'=>'img-thumbnail','style'=>'max-width:500px;']);
        }
        return $img;
    }
    public function getPhotoViewer(){
        return empty($this->photos) ? Yii::getAlias('@web').'/img/none.png' : $this->getUploadUrl().$this->photos;
    }

}
