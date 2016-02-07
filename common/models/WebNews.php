<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use common\models\Newscategories;

/**
 * This is the model class for table "web_news".
 *
 * @property integer $id
 * @property string $name
 * @property string $detail
 * @property integer $viewtotail
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $newscategories_id
 *
 * @property Newscategories $newscategories
 */
class WebNews extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'web_news';
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
            [['viewtotail', 'status', 'created_at', 'updated_at', 'newscategories_id'], 'integer'],
            [['newscategories_id'], 'required'],
            [['name'], 'string', 'max' => 50],
            [['detail'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'รหัสข่าว',
            'name' => 'ชื่อข่าว',
            'detail' => 'รายละเอียดข่าว',
            'viewtotail' => 'จำนวนที่เข้าชม',
            'status' => 'สถานะ',
            'created_at' => 'วันที่สร้าง',
            'updated_at' => 'วันที่แก้ไข',
            'newscategories_id' => 'หมวดหมู่',
            'newscategoriesName'=>'หมวดหมู่',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNewscategories()
    {
        return $this->hasOne(Newscategories::className(), ['id' => 'newscategories_id']);
    }

    public function getNewscategoriesName()
    {
        return $this->newscategories->name;
    }
}
