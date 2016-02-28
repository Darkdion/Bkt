<?php

namespace common\models;

use Yii;

use yii\helpers\ArrayHelper;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "personnel".
 *
 * @property integer $per_id
 * @property integer $title
 * @property string $firstname
 * @property string $lastname
 * @property string $identification
 * @property string $birthday
 * @property integer $sex
 * @property string $address
 * @property integer $marital
 * @property string $province
 * @property string $amphur
 * @property string $district
 * @property string $zip_code
 * @property integer $salary
 * @property string $expire_date
 * @property string $phone
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $user_id
 *
 * @property User $user
 */
class Personnel extends \yii\db\ActiveRecord
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
            [
                'class' => 'mdm\autonumber\Behavior',
                'attribute' => 'per_id', // required
                'group' => $this->per_id, // optional
                'value' => ''.date('Ymd').'?' , // format auto number. '?' will be replaced with generated number
                'digit' => 4 // optional, default to null.
            ],
        ];
    }
    public static function tableName()
    {
        return 'personnel';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [

            [['per_id'], 'autonumber', 'format'=>''.date('Ymd').'?'],
            [['birthday', 'sex', 'expire_date','title','marital','phone','salary'], 'safe'],
            [['firstname', 'lastname'], 'string', 'max' => 50],
            [['identification'], 'required'],
            [['address'], 'string', 'max' => 100],
            [['province', 'amphur', 'district', 'zip_code'], 'string', 'max' => 6],

        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'per_id' => 'รหัสพนักงาน',
            'title' => 'คำนำหน้า',
            'fullName'=>'ชื่อ-นามสกุล',
            'firstname' => 'ชื่อ',
            'lastname' => 'นามสกุล',
            'identification' => 'เลขบัตรประชาชน',
            'birthday' => 'วันเกิด',
            'sex' => 'เพศ',
            'sexName'=>'เพศ',
            'address' => 'ที่อยู่ ,บ้านเลขที่, ถนน, หมู่บ้าน',
            'marital' => 'สภานะ',
            'province' => 'จังหวัด',
            'amphur' => 'อำเภอ',
            'district' => 'ตำบล',
            'zip_code' => 'รหัสไปรษณีย์',
            'salary' => 'เงินเดือน',
            'expire_date' => 'วันที่ลาออก',
            'phone' => 'เบอร์โทรศัพท์',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'user_id' => 'รหัสผู้ใช้งาน',
            'userName'=>'ชื่อผู้ใช้งาน',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
    public function getUsername(){
        return $this->user->username;
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
        return ArrayHelper::getValue($this->getItemMarital(),$this->marital);
    }



    public function getTitleName(){
        return ArrayHelper::getValue($this->getItemTitle(),$this->title);
    }

    public function getFullName()
    {
        return $this->titleName.$this->firstname.' '.$this->lastname;
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
