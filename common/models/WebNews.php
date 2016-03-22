<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use common\models\Newscategories;
use yii\web\UploadedFile;
use yii\helpers\Html;

/**
 * This is the model class for table "web_news".
 *
 * @property integer $id
 * @property string $name
 * @property string $detail
 * @property integer $viewtotail
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $newscategories_id
 *
 * @property Newscategories $newscategories
 */
class WebNews extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public  $foder='photos/news'; /// ที่เก็บรูป
    public static function tableName()
    {
        return 'web_news';
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

            [['newscategories_id'], 'required','message' => 'กรุณาเลือกประเภทข่าว.'],
            [['name','status'], 'safe'],
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
            'id' => 'รหัสข่าว',
            'name' => 'ชื่อข่าว',
            'detail' => 'รายละเอียดข่าว',
            'viewtotail' => 'จำนวนที่เข้าชม',
            'status' => 'สถานะ',
            'created_at' => 'วันที่สร้าง',
            'updated_at' => 'วันที่แก้ไข',
            'newscategories_id' => 'หมวดหมู่',
            'newscategoriesName'=>'หมวดหมู่',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNewscategories()
    {
        return $this->hasOne(Newscategories::className(), ['id' => 'newscategories_id']);
    }

    public function getNewscategoriesName()
    {
        return $this->newscategories->name;
    }


    /// ทำการเก็บรูป
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
