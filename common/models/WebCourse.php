<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\helpers\Html;
use yii\web\UploadedFile;
/**
 * This is the model class for table "web_course".
 *
 * @property integer $id
 * @property string $name
 * @property string $detail
 * @property string $photos
 * @property integer $viewtotail
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $typecourse_id
 *
 * @property Typecourse $typecourse
 */
class WebCourse extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public  $foder='photos/photocourse';
    public static function tableName()
    {
        return 'web_course';
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

            [['viewtotail', 'status', 'created_at', 'updated_at', 'typecourse_id'], 'integer'],
            [['typecourse_id'], 'required'],
            [['name'], 'string', 'max' => 50],
            [['detail'], 'string', 'max' => 255],
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
            'id' => 'รหัสคอร์สเรียน',
            'name' => 'ชื่อคอรืสเรียน',
            'detail' => 'รายละเอียด',
            'photos' => 'รูปภาพ',
            'viewtotail' => 'ยอดดู',
            'status' => 'สถานะ',
            'created_at' => 'วันที่สร้าง',
            'updated_at' => 'วันที่แก้ไข',
            'typecourse_id' => 'ประเภทคอร์ส',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */

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
    public function getTypecourse()
    {
        return $this->hasOne(Typecourse::className(), ['id' => 'typecourse_id']);
    }
}
