<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;
use yii\behaviors\TimestampBehavior;
use yii\helpers\Html;
use yii\web\UploadedFile;

/**
 * This is the model class for table "teacher".
 *
 * @property integer $id
 * @property integer $title
 * @property string $name
 * @property string $surname
 * @property string $identification
 * @property string $birthday
 * @property integer $sex
 * @property integer $age
 * @property string $province
 * @property string $amphur
 * @property string $district
 * @property string $address
 * @property string $experience
 * @property string $phone
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property Score[] $scores
 * @property Course[] $courses
 */
class Teacher extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    const SEX_MEN = 1;
    const SEX_WOMEN = 2;
    public  $foder='photos/teacher';
    public static function tableName()
    {
        return 'teacher';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'sex', 'age', 'created_at', 'updated_at'], 'integer'],
            [['birthday'], 'safe'],
            [['name', 'surname'], 'string', 'max' => 50],
            [['identification'], 'string', 'max' => 13],
            [['province', 'amphur', 'district'], 'string', 'max' => 6],
            [['address', 'experience'], 'string', 'max' => 100],
            [['phone'], 'string', 'max' => 10],
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
            'id' => 'รหัสอาจารย์',
            'title' => 'คำนำหน้า',
            'name' => 'ชื่ออาจารย์',
            'surname' => 'นามสกุล',
            'identification' => 'เลขบัตรประชาชน',
            'birthday' => 'วันเกิด',
            'sexName' => 'เพศ',
            'sex' => 'เพศ',
            'age' => 'อายุ',
            'province' => 'จังหวัด',
            'amphur' => 'อำเภอ',
            'district' => 'ตำบล',
            'address' => 'ที่อยู่',
            'experience' => 'ประสบการณ์การทำงาน',
            'phone' => 'เบอร์โทร',
            'created_at' => 'วันที่สร้าง',
            'updated_at' => 'วันที่แก้ไข',
            'fullName'=>'ชื่อ-นามสกุล',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */

    public static function itemsAlias($key){

        $items = [
            'sex'=>[
                self::SEX_MEN => 'ชาย',
                self::SEX_WOMEN => 'หญิง'
            ],
            'title'=>[
                1 => 'นาย',
                2 => 'นางสาว',
                3 => 'นาง'
            ],
            'marital'=>[
                1 => 'โสด',
                2 => 'สมรส',
                3 => 'เป็นหม้าย',
                4 => 'หย่าร้าง'
            ],
            'education'=>[
                1 => 'ต่ำกว่ามัธยมศึกษาตอนต้น',
                2 => 'มัธยมศึกษาตอนต้น',
                3 => 'ปวช',
                4 => 'มัธยมศึกษาตอนปลาย',
                5 => 'ปวส',
                6 => 'อนุปริญญา',
                7 => 'ปริญญาตรี',
                8 => 'ปริญญาโท',
                9 => 'ปริญญาเอก'
            ],
            'skill'=>[
                'php' => 'PHP',
                'js' => 'JavaScript',
                'css' => 'CSS',
                'html5' => 'Html5',
                'angularjs' => 'AngularJs',
                'node.js' => 'Node.Js',
                'reactjs' => 'ReactJs',
                'go'=>'Go',
                'ruby'=>'ruby on rails',
                'swiff' => 'Swiff',
                'android' => 'Android',
            ]
        ];
        return ArrayHelper::getValue($items,$key,[]);
        //return array_key_exists($key, $items) ? $items[$key] : [];
    }

    public function getItemSex()
    {
        return self::itemsAlias('sex');
    }

    public function getItemMarital()
    {
        return self::itemsAlias('marital');
    }

    public function getItemEducation()
    {
        return self::itemsAlias('education');
    }

    public function getItemTitle()
    {
        return self::itemsAlias('title');
    }



    public function getSexName(){
        return ArrayHelper::getValue($this->getItemSex(),$this->sex);
    }

    public function getMaritalName(){
        return ArrayHelper::getValue($this->getItemMarital(),$this->marital_status);
    }

    public function getEducationName(){
        return ArrayHelper::getValue($this->getItemEducation(),$this->education_level);
    }

    public function getTitleName(){
        return ArrayHelper::getValue($this->getItemTitle(),$this->title);
    }



    public function getFullName()
    {
        return $this->titleName.$this->name.' '.$this->surname;
    }


    public function getScores()
    {
        return $this->hasMany(Score::className(), ['teacher_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCourses()
    {
        return $this->hasMany(Course::className(), ['teacher_id' => 'id']);
    }

    ///////////////////เชื่อมกับ เบส อำเภอ ตำบล จังหวัด

    public function getProvinces(){
        return @$this->hasOne(Province::className(),['PROVINCE_ID'=>'province']);
    }
    public function getProvinceName(){
        return @$this->provinces->PROVINCE_NAME;
    }

    public function getAmphurs(){
        return @$this->hasOne(Amphur::className(),['AMPHUR_ID'=>'province']);
    }
    public function getAmphurName(){
        return @$this->amphurs->AMPHUR_NAME;
    }

    public function getDistricts(){
        return @$this->hasOne(District::className(),['DISTRICT_ID'=>'province']);
    }
    public function getDistrictName(){
        return @$this->districts->DISTRICT_NAME;
    }

//////////////////////อัพรูป
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
