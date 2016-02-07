<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
/**
 * This is the model class for table "web_contact".
 *
 * @property integer $id
 * @property string $name
 * @property string $datail
 * @property string $phone
 * @property string $email
 * @property integer $created_at
 * @property integer $updated_at
 */
class WebContact extends \yii\db\ActiveRecord
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
        return 'web_contact';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['created_at', 'updated_at'], 'integer'],
            [['name'], 'string', 'max' => 50],
            [['detail'], 'string', 'max' => 255],
            [['email','email'],'required','message'=>'กรุณากรอกอีเมล์'],
            ['phone', 'required','message'=>'กรุณากรอกเบอร์โทรศัพท์..'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'ชื่อสถาบัน',
            'detail' => 'รายละเอียด',
            'phone' => 'โทรศัทพ์',
            'email' => 'อีเมล์',
            'created_at' => 'วันที่สร้าง',
            'updated_at' => 'วันที่แก้ไข',
        ];
    }
}
