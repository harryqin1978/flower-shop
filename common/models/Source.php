<?php

namespace common\models;

use Yii;
use \yii\db\ActiveRecord;

class Source extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%source}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['priority'], 'integer'],
        ];
    }

    public function getOrders()
    {
        return $this->hasMany(Order::className(), ['source_id' => 'id']);
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($this->priority < 0) {
                $this->priority = 0;
            }
            return true;
        } else {
            return false;
        }
    }
}