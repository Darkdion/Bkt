<?php

namespace common\models;
use yii\helpers\Html;
use yii\web\UploadedFile;
use Yii;

/**
 * This is the model class for table "course".
 *
 * @property integer $id
 * @property string $name
 * @property string $detail
 * @property integer $price
 * @property string $date_s
 * @property string $date_c
 * @property string $photos
 * @property integer $typecourse_id
 * @property integer $teacher_id
 *
 * @property Teacher $teacher
 * @property Typecourse $typecourse
 * @property Payment[] $payments
 */
class Course extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public  $foder='photos/course';

    public static function tableName()
    {
        return 'course';
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            [
                'class' => 'mdm\autonumber\Behavior',
                'attribute' => 'cod_id', // required
                'group' => $this->cod_id, // optional
                'value' => 'COD'.date('Ymd').'?' , // format auto number. '?' will be replaced with generated number
                'digit' => 4 // optional, default to null.
            ],
        ];
    }
    public function rules()
    {
        return [
            [['cod_id'], 'autonumber', 'format'=>'COD'.date('Ymd').'?'],
           // [['price', 'typecourse_id', 'teacher_id'], 'integer'],
            [['date_s', 'date_c','price', 'typecourse_id', 'teacher_id'], 'safe'],
            // [['price'],'float'],
            [['typecourse_id', 'teacher_id'], 'required'],
            [['name','detail'], 'string'],
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
            'id' => 'รหัสคอร์ส',
            'name' => 'ชื่อคอร์ส',
            'detail' => 'รายละเอียด',
            'price' => 'ราคา',
            'date_s' => 'วันที่เริ่ม',
            'date_c' => 'วันที่สิ้นสุด',
            'photos' => 'รูปภาพ',
            'typecourse_id' => 'ประเภทคอร์สเรียน',
            'teacher_id' => 'อาจารย์ผู้สอน',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTeacher()
    {
        return $this->hasOne(Teacher::className(), ['id' => 'teacher_id']);
    }



    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTypecourse()
    {
        return $this->hasOne(Typecourse::className(), ['id' => 'typecourse_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPayments()
    {
        return $this->hasMany(Payment::className(), ['course_id' => 'id']);
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
        return empty($this->photos) ? Yii::getAlias('@web').'/img/none.jpg' : $this->getUploadUrl().$this->photos;
    }
}
