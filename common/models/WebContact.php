<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "web_contact".
 *
 * @property integer $id
 * @property string $name
 * @property string $detail
 * @property string $phone
 * @property string $email
 * @property string $fax
 * @property string $website
 * @property string $facebook
 * @property string $line_id
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
            [['website'], 'string'],

            [['name', 'email'], 'string', 'max' => 50],
            [['detail', 'facebook', 'line_id'], 'string', 'max' => 255],
            [['phone'], 'string', 'max' => 10],
            [['fax'], 'string', 'max' => 20]
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
            'fax' => 'Fax',
            'website' => 'เว็บไซต์',
            'facebook' => 'Facebook',
            'line_id' => 'Line ID',
        ];
    }
}
