<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "registerdetail".
 *
 * @property integer $id
 * @property integer $register_course_id
 * @property integer $course_id
 * @property double $price
 *
 * @property Course $course
 * @property RegisterCourse $registerCourse
 */
class Registerdetail extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'registerdetail';
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
            'register_course_id' => 'Register Course ID',
            'course_id' => 'Course ID',
            'price' => 'Price',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCourse()
    {
        return $this->hasOne(Course::className(), ['id' => 'course_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRegisterCourse()
    {
        return $this->hasOne(RegisterCourse::className(), ['id' => 'register_course_id']);
    }
}
