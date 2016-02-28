<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "register_cart".
 *
 * @property integer $id
 * @property integer $register_course_id
 * @property integer $course_id
 *
 * @property Course $course
 * @property RegisterCourse $registerCourse
 */
class RegisterCart extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'register_cart';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['register_course_id', 'course_id'], 'required'],
            [['register_course_id', 'course_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'register_course_id' => 'Register Course ID',
            'course_id' => 'Course ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCourse()
    {
        return $this->hasOne(Course::className(), ['id' => 'course_id']);
    }

    public function getCourseName(){
        return@$this->course->name;
    }
    public function getPriceName(){
        return@$this->course->price;
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRegisterCourse()
    {
        return $this->hasOne(RegisterCourse::className(), ['id' => 'register_course_id']);
    }
}
