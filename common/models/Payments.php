<?php

namespace common\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;

/**
 * This is the model class for table "payments".
 *
 * @property integer $id
 * @property string $pay_date
 * @property string $register_course_id
 * @property integer $student_id
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $created_by
 * @property integer $updated_by
 *
 * @property RegisterCourse $registerCourse
 * @property Student $student
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
    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => 'yii\behaviors\TimestampBehavior',
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
                'value' => new Expression('NOW()'),
            ],
            'blameable' => [
                'class' => BlameableBehavior::className(),
                'createdByAttribute' => 'created_by',
                'updatedByAttribute' => 'updated_by',
            ],

        ];
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pay_date'], 'safe'],
            [['register_course_id', 'student_id', 'status', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'pay_date' => 'วันที่ชำระ',
            'register_course_id' => 'Register Course ID',
            'student_id' => 'ชื่อสมาชิก',
            'status' => 'สถานะ',
            'created_at' => 'วันที่สร้าง',
            'updated_at' => 'วันที่แก้ไข',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRegisterCourse()
    {
        return $this->hasOne(RegisterCourse::className(), ['id' => 'register_course_id']);
    }
    public function getCreateUser()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }

    public function getCreateUserName()
    {
        return $this->createUser ? $this->createUser->username : '- no user -';
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudent()
    {
        return $this->hasOne(Student::className(), ['id' => 'student_id']);
    }
}
