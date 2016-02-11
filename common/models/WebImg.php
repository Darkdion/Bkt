<?php

namespace common\models;
use yii\web\UploadedFile;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\helpers\Html;
/**
 * This is the model class for table "web_img".
 *
 * @property integer $id
 * @property string $name
 * @property string $photos
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class WebImg extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */

    public  $foder='photos/photoslider';
    public static function tableName()
    {
        return 'web_img';
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    public function rules()
    {
        return [
          //  [['photos'], 'required'],
            //[['photos'], 'string'],
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['name'], 'string', 'max' => 50],
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
            'id' => 'รหัสภาพ',
            'name' => 'ชื่อภาพ',
            'photos' => 'Photos',
            'status' => 'สถานะ',
            'created_at' => 'วันที่สร้าง',
            'updated_at' => 'วันที่แก้ไข',
        ];
    }
    public function upload($model,$attribute)
    {
        $photos  = UploadedFile::getInstance($model, $attribute);
        $path = $this->getUploadPath();
        if ($this->validate() && $photos !== null) {

            $fileName = md5($photos->baseName.time()) . '.' . $photos->extension;
            //$fileName = $photo->baseName . '.' . $photo->extension;
            if($photos->saveAs($path.$fileName)){
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
