<?php

namespace common\models;

use Yii;
use \yii\db\ActiveRecord;

class Paymethod extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%paymethod}}';
    }

    public function getOrders()
    {
        return $this->hasMany(Order::className(), ['paymethod_id' => 'id']);
    }

}