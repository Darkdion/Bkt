<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;

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

    const SEX_MEN = 1;
    const SEX_WOMEN = 2;
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
            [['phone'], 'string', 'max' => 10]
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
            'sex' => 'เพศ',
            'age' => 'Age',
            'province' => 'จังหวัด',
            'amphur' => 'อำเภอ',
            'district' => 'ตำบล',
            'address' => 'ที่อยู่',
            'experience' => 'ประสบการณ์การทำงาน',
            'phone' => 'เบอร์โทร',
            'created_at' => 'วันที่สร้าง',
            'updated_at' => 'วันที่แก้ไข',
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

    public function getEducationName(){
        return ArrayHelper::getValue($this->getItemEducation(),$this->education_level);
    }

    public function getTitleName(){
        return ArrayHelper::getValue($this->getItemTitle(),$this->title);
    }

    public function getSkillName(){
        $skills = $this->getItemSkill();
        $skillSelected = explode(',', $this->skill);
        $skillSelectedName = [];
        foreach ($skills as $key => $skillName) {
            foreach ($skillSelected as $skillKey) {
                if($key === $skillKey){
                    $skillSelectedName[] = $skillName;
                }
            }
        }

        return implode(', ', $skillSelectedName);
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
}
