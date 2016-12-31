<?php

namespace common\models;

use Yii;
use \yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use yii\web\UploadedFile;

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
    public $imageFile;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%order}}';
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
            [['source_id', 'price', 'paymethod_id', 'send_date', 'description', 'receiver_name', 'receiver_address'], 'required'],
            [['source_id', 'paymethod_id'], 'integer'],
            [['price', 'cost'], 'number'],
            [['send_date'], 'date'],
            [['card_info', 'hidden_info'], 'string'],
            [['description', 'special', 'receiver_name', 'receiver_address'], 'string', 'max' => 255],
            [['receiver_mobile', 'buyer_mobile', 'buyer_identify'], 'string', 'max' => 50],
            [['price', 'cost'], 'default', 'value' => 0],
            [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, gif'],
        ];
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public function getSource()
    {
        return $this->hasOne(Source::className(), ['id' => 'source_id']);
    }

    public function getPaymethod()
    {
        return $this->hasOne(Paymethod::className(), ['id' => 'paymethod_id']);
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
    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($insert) {
                $this->user_id = Yii::$app->user->id;
            }

            $this->imageFile = UploadedFile::getInstance($this, 'imageFile');
            if ($this->imageFile) {
                $fileName = Yii::$app->getSecurity()->generateRandomString() . '.' . $this->imageFile->extension;
                $this->imageFile->saveAs(Yii::getAlias('@webroot/uploads/') . $fileName);
                $this->image_url = Yii::getAlias('@web/uploads/' . $fileName);
            }

            return true;
        } else {
            return false;
        }
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

    public function upload()
    {
        // if ($this->validate()) {
        //     foreach ($this->imageFiles as $file) {
        //         $filesaveAs('uploads/' . Yii::$app->getSecurity()->generateRandomString() . '.' . $this->imageFile->extension);
        //     }
        //     return true;
        // } else {
        //     return false;
        // }
    }}
