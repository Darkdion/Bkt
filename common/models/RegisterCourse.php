<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%register_course}}".
 *
 * @property integer $id
 * @property integer $student_id
 * @property string $date_register
 * @property integer $status
 * @property integer $created_at
 * @property integer $update_at
 *
 * @property Payment[] $payments
 * @property Student $student
 * @property Registerdetail[] $registerdetails
 */
class RegisterCourse extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%register_course}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['student_id'], 'required'],
            [['student_id', 'status', 'created_at', 'update_at'], 'safe'],

        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'รหัสลงทะเบียน',
            'student_id' => 'ชื่อสมาชิก',
            'date_register' => 'วันที่ลงทะเบียน',
            'status' => 'สถานะ',
            'created_at' => 'วันที่สร้าง',
            'update_at' => 'วันที่แก้ไข',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPayments()
    {
        return $this->hasMany(Payment::className(), ['register_course_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudent()
    {
        return $this->hasOne(Student::className(), ['id' => 'student_id']);
    }
    public function getFullName()
    {
        return $this->student->titleName.$this->student->firstname.' '.$this->student->lastname;
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRegisterdetails()
    {
        return $this->hasMany(Registerdetail::className(), ['register_course_id' => 'id']);
    }
}
