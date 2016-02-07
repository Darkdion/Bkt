<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "newscategories".
 *
 * @property integer $id
 * @property string $name
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property WebNews[] $webNews
 */
class Newscategories extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'newscategories';
    }


    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
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
            'id' => 'รหัสหมวดหมู่',
            'name' => 'ชื่อหมวดหมู่',
            'created_at' => 'วันที่สร้าง',
            'updated_at' => 'วันที่แก้ไข',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getWebNews()
    {
        return $this->hasMany(WebNews::className(), ['newscategories_id' => 'id']);
    }
}
