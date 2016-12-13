<?php

namespace common\models;

use Yii;
use \yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "order".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $source_id
 * @property string $price
 * @property integer $paymethod_id
 * @property string $send_date
 * @property string $description
 * @property string $special
 * @property string $card_info
 * @property string $hidden_info
 * @property string $receiver_name
 * @property string $receiver_mobile
 * @property string $receiver_address
 * @property string $buyer_mobile
 * @property string $buyer_identify
 * @property string $cost
 * @property integer $created_at
 * @property integer $updated_at
 */
class Order extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'order';
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
                // if you're using datetime instead of UNIX timestamp:
                // 'value' => new Expression('NOW()'),
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'source_id', 'price', 'paymethod_id', 'send_date', 'description', 'receiver_name', 'receiver_address'], 'required'],
            [['user_id', 'source_id', 'paymethod_id'], 'integer'],
            [['price', 'cost'], 'number'],
            [['send_date'], 'date'],
            [['card_info', 'hidden_info'], 'string'],
            [['description', 'special', 'receiver_name', 'receiver_address'], 'string', 'max' => 255],
            [['receiver_mobile', 'buyer_mobile', 'buyer_identify'], 'string', 'max' => 50],
            [['price', 'cost'], 'default', 'value' => 0],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'source_id' => Yii::t('app', 'Source ID'),
            'price' => Yii::t('app', 'Price'),
            'paymethod_id' => Yii::t('app', 'Paymethod ID'),
            'send_date' => Yii::t('app', 'Send Date'),
            'description' => Yii::t('app', 'Description'),
            'special' => Yii::t('app', 'Special'),
            'card_info' => Yii::t('app', 'Card Info'),
            'hidden_info' => Yii::t('app', 'Hidden Info'),
            'receiver_name' => Yii::t('app', 'Receiver Name'),
            'receiver_mobile' => Yii::t('app', 'Receiver Mobile'),
            'receiver_address' => Yii::t('app', 'Receiver Address'),
            'buyer_mobile' => Yii::t('app', 'Buyer Mobile'),
            'buyer_identify' => Yii::t('app', 'Buyer Identify'),
            'cost' => Yii::t('app', 'Cost'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * @inheritdoc
     */
    public function afterFind()
    {
        $this->created_at = Yii::$app->formatter->asDateTime($this->created_at);
        $this->updated_at = Yii::$app->formatter->asDateTime($this->updated_at);

        parent::afterFind();
    }
}
