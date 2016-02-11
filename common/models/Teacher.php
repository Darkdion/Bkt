<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "teacher".
 *
 * @property integer $t_id
 * @property integer $title
 * @property string $fistname
 * @property string $lastname
 * @property string $identification
 * @property string $education_end
 * @property string $birthday
 * @property integer $sex
 * @property string $address
 * @property string $phone
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
            [['title', 'sex'], 'integer'],
            [['birthday'], 'safe'],
            [['fistname', 'lastname'], 'string', 'max' => 50],
            [['identification'], 'string', 'max' => 13],
            [['education_end', 'address'], 'string', 'max' => 100],
            [['phone'], 'string', 'max' => 10]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            't_id' => 'รหัสอาจารย์',
            'title' => 'คำนำหน้า',
            'fistname' => 'ชื่ออาจารย์',
            'lastname' => 'นามสกุล',
            'identification' => 'เลขบัตรประชาชน',
            'education_end' => 'จบการศึกษา',
            'birthday' => 'วันเกิด',
            'sex' => 'เพศ',
            'address' => 'ที่อยู่',
            'phone' => 'เบอร์โทร',
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


        ];
        return ArrayHelper::getValue($items,$key,[]);
        //return array_key_exists($key, $items) ? $items[$key] : [];
    }
    public function getItemTitle()
    {
        return self::itemsAlias('title');
    }

    public function getItemSex()
    {
        return self::itemsAlias('sex');
    }

    public function getSexName(){
        return ArrayHelper::getValue($this->getItemSex(),$this->sex);
    }
    public function getTitleName(){
        return ArrayHelper::getValue($this->getItemTitle(),$this->title);
    }

    public function getFullName()
    {
        return $this->titleName.$this->fistname.' '.$this->lastname;
    }
    public function getScores()
    {
        return $this->hasMany(Score::className(), ['teacher_id' => 't_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCourses()
    {
        return $this->hasMany(Course::className(), ['teacher_id' => 't_id']);
    }
}
