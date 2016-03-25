<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;


use yii\behaviors\TimestampBehavior;
/**
 * This is the model class for table "student".
 *
 * @property integer $id
 * @property integer $title
 * @property string $firstname
 * @property string $lastname
 * @property string $identification
 * @property integer $education
 * @property string $birthday
 * @property integer $sex
 * @property string $address
 * @property integer $school_id
 * @property string $province
 * @property string $amphur
 * @property string $district
 * @property string $zip_code
 * @property string $phone
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property Payment[] $payments
 * @property Paynotify[] $paynotifies
 * @property RegisterCourse[] $registerCourses
 * @property School $school
 */
class Student extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */

    const SEX_MEN = 1;
    const SEX_WOMEN = 2;
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }
    public static function tableName()
    {
        return 'student';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            //[['title', 'sex', 'school_id', 'created_at', 'updated_at'], 'integer'],

              [['sex', 'user_id', 'school_id'], 'integer'],
            ['identification','unique','targetClass' => '\common\models\Student', 'message' => 'เลขบัตรประชาชนซ้ำหรือมีผู้งานงานแล้ว'],
            [['birthday','schoolName','sex' ,'phone'], 'safe'],
            [['school_id','schoolName','province','amphur','district'], 'required'],
            [['firstname', 'lastname'], 'string', 'max' => 50],
            [['identification','education','title'],'required'],
            [['address'], 'string', 'max' => 100],
            [['province', 'amphur', 'district'], 'string', 'max' => 6],
            [['zip_code'], 'string', 'max' => 5],

        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'รหัสนักเรียน',
            'title' => 'คำนำหน้า',
            'firstname' => 'ชื่อสมาชิก',
            'lastname' => 'นามสกุล',
            'identification' => 'เลขบัตรประชาชน',
            'education' => 'ระดับการศึกษา',
            'birthday' => 'วันเกิด',
            'sex' => 'เพศ',
            'address' => 'บ้านเลขที่, ถนน, หมู่บ้าน',
            'school_id' => 'ชื่อโรงเรียน',
            'province' => 'จังหวัด',
            'amphur' => 'อำเภอ',
            'district' => 'ตำบล',
            'zip_code' => 'รหัสไปรษณีย์',
            'phone' => 'เบอร์โทร',
            'created_at' => 'วันที่สร้าง',
            'updated_at' => 'วันที่แก้ไข',
            'fullName'=>'ชื่อ-นามสกุล',
            'schoolName'=>'โรงเรียนที่สังกัด',
            'username'=>'ชื่อผู้ใช้งาน',
            'sexName'=>'เพศ',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    // public all getUser(){
    //     return $this->hasOne(User::className(),['id'=>'user_id']);
    // }
    public  function getUser(){

    return $this->hasOne(User::className(),['id'=>'user_id']);
}
    public function getUsername(){
        return $this->user->username;
    }


    public function getPayments()
    {
        return $this->hasMany(Payment::className(), ['student_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPaynotifies()
    {
        return $this->hasMany(Paynotify::className(), ['student_stu_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRegisterCourses()
    {
        return $this->hasMany(RegisterCourse::className(), ['student_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSchool()
    {
        return @$this->hasOne(School::className(), ['id' => 'school_id']);
    }
    public function getSchoolName(){
        return @$this->school->name;
    }


    public static function itemsAlias($key){

        $items = [
            'sex'=>[
                self::SEX_MEN => 'ชาย',
                self::SEX_WOMEN => 'หญิง'
            ],
            'title'=>[

                1=> 'เด็กชาย',
                2=>'เด็กหญิง',
                3 => 'นาย',
                4 => 'นางสาว',
                5 => 'นาง'
            ],
            'marital'=>[
                1 => 'โสด',
                2 => 'สมรส',
                3 => 'เป็นหม้าย',
                4 => 'หย่าร้าง'
            ],
            'education'=>[
                'เตรียมอนุบาล'=>'เตรียมอนุบาล',
                'อนุบาล'=>'อนุบาล',
                'ประถมศึกษาปีที่ 1'=>'ประถมศึกษาปีที่ 1',
                'ประถมศึกษาปีที่ 2'=>'ประถมศึกษาปีที่ 2',
                'ประถมศึกษาปีที่ 3'=>'ประถมศึกษาปีที่ 3',
                'ประถมศึกษาปีที่ 4'=>'ประถมศึกษาปีที่ 4',
                'ประถมศึกษาปีที่ 5'=>'ประถมศึกษาปีที่ 5',
                'ประถมศึกษาปีที่ 6'=>'ประถมศึกษาปีที่ 6',
                'มัธยมศึกษาปีที่ 1'=>'มัธยมศึกษาปีที่ 1',
                'มัธยมศึกษาปีที่ 2'=>'มัธยมศึกษาปีที่ 2',
                'มัธยมศึกษาปีที่ 3'=>'มัธยมศึกษาปีที่ 3',
                'มัธยมศึกษาปีที่ 4'=>'มัธยมศึกษาปีที่ 4',
                'มัธยมศึกษาปีที่ 5'=>'มัธยมศึกษาปีที่ 5',
                'มัธยมศึกษาปีที่ 6'=>'มัธยมศึกษาปีที่ 6',


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

    public function getItemSkill()
    {
        return self::itemsAlias('skill');
    }

    public function getSexName(){
        return ArrayHelper::getValue($this->getItemSex(),$this->sex);
    }


    public function getMaritalName(){
        return ArrayHelper::getValue($this->getItemMarital(),$this->marital_status);
    }



    public function getTitleName(){
        return ArrayHelper::getValue($this->getItemTitle(),$this->title);
    }

    public function getFullName()
    {
        return $this->titleName.$this->firstname.' '.$this->lastname;
    }
    public function getName()
    {
        return $this->firstname.' '.$this->lastname;
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
}
