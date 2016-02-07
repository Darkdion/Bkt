<?php

namespace common\models;

use Yii;

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
            [['name', 'email'], 'string', 'max' => 50],
            [['datail'], 'string', 'max' => 255],
            [['phone'], 'string', 'max' => 10]
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
            'datail' => 'รายละเอียด',
            'phone' => 'โทรศัทพ์',
            'email' => 'อีเมล์',
            'created_at' => 'วันที่สร้าง',
            'updated_at' => 'วันที่แก้ไข',
        ];
    }
}
