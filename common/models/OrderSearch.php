<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * OrderSearch represents the model behind the search form about `app\models\Order`.
 */
class OrderSearch extends Order
{
    public $user_name;
    public $source_name;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'source_id', 'paymethod_id', 'created_at', 'updated_at'], 'integer'],
            [['price', 'cost'], 'number'],
            [['send_date', 'description', 'special', 'card_info', 'hidden_info', 'receiver_name', 'receiver_mobile', 'receiver_address', 'buyer_mobile', 'buyer_identify', 'user_name', 'source_name'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Order::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'defaultPageSize' => 10,
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'user_id' => $this->user_id,
            'source_id' => $this->source_id,
            'price' => $this->price,
            'paymethod_id' => $this->paymethod_id,
            'send_date' => $this->send_date,
            'cost' => $this->cost,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'special', $this->special])
            ->andFilterWhere(['like', 'card_info', $this->card_info])
            ->andFilterWhere(['like', 'hidden_info', $this->hidden_info])
            ->andFilterWhere(['like', 'receiver_name', $this->receiver_name])
            ->andFilterWhere(['like', 'receiver_mobile', $this->receiver_mobile])
            ->andFilterWhere(['like', 'receiver_address', $this->receiver_address])
            ->andFilterWhere(['like', 'buyer_mobile', $this->buyer_mobile])
            ->andFilterWhere(['like', 'buyer_identify', $this->buyer_identify]);

        if ($this->user_name) {
            if ($user = User::findOne(['username' => trim($this->user_name)])) {
                $query->andFilterWhere(['user_id' => $user->id]);
            } else {
                $query->andWhere('1=0');
            }
        }

        if ($this->source_name) {
            if ($source = Source::findOne(['name' => trim($this->source_name)])) {
                $query->andFilterWhere(['source_id' => $source->id]);
            } else {
                $query->andWhere('1=0');
            }
        }

        return $dataProvider;
    }
}
