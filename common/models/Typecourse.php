<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "typecourse".
 *
 * @property integer $id
 * @property string $name
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property Course[] $courses
 * @property WebCourse[] $webCourses
 */
class Typecourse extends \yii\db\ActiveRecord
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

    public static function tableName()
    {
        return 'typecourse';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['created_at', 'updated_at'], 'integer'],
            [['name'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'รหัสประเภทคอร์ส',
            'name' => 'ชื่อประเภทคอร์ส',
            'created_at' => 'วันที่สร้าง',
            'updated_at' => 'วันที่แก้ไข',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCourses()
    {
        return $this->hasMany(Course::className(), ['typecourse_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWebCourses()
    {
        return $this->hasMany(WebCourse::className(), ['typecourse_id' => 'id']);
    }
}
