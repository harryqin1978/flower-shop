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

    public function getOrders()
    {
        return $this->hasMany(Order::className(), ['source_id' => 'id']);
    }

}