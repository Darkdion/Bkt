<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "payments".
 *
 * @property integer $id
 * @property string $pay_date
 * @property integer $personnel_per_id
 * @property string $register_course_id
 * @property integer $student_id
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property RegisterCourse $registerCourse
 * @property Student $student
 * @property Personnel $personnelPer
 */
class Payments extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'payments';
    }

    /**
     * @inheritdoc
     */


    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'pay_date' => 'วันที่ชำระ',
            'personnel_per_id' => 'Personnel Per ID',
            'register_course_id' => 'Register Course ID',
            'student_id' => 'ชื่อสมาชิก',
            'status' => 'สถานะ',
            'created_at' => 'วันที่สร้าง',
            'updated_at' => 'วันที่แก้ไข',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRegisterCourse()
    {
        return $this->hasOne(RegisterCourse::className(), ['id' => 'register_course_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudent()
    {
        return $this->hasOne(Student::className(), ['id' => 'student_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersonnelPer()
    {
        return $this->hasOne(Personnel::className(), ['per_id' => 'personnel_per_id']);
    }
}
