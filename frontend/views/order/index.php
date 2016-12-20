<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\OrderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Orders');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Order'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            // ['class' => 'yii\grid\SerialColumn'],

            'id',
            'user_id',
            'source_id',
            'price',
            'paymethod_id',
            // 'send_date',
            // 'description',
            // 'special',
            // 'card_info:ntext',
            // 'hidden_info:ntext',
            // 'receiver_name',
            // 'receiver_mobile',
            // 'receiver_address',
            // 'buyer_mobile',
            // 'buyer_identify',
            // 'cost',
            // 'created_at',
            // 'updated_at',

            [
                'class' => 'common\components\AdvancedActionColumn',
                // 'urlCreator' => function ($action, $model, $key, $index, $actionColumn) {
                //     $params = is_array($key) ? $key : ['id' => (string) $key];
                //     if ($action == 'update') {
                //         $params['redirect-url'] = Url::current();
                //     }
                //     $params[0] = $actionColumn->controller ? $actionColumn->controller . '/' . $action : $action;
                //     return Url::toRoute($params);
                // },
            ],
        ],
    ]); ?>
</div>
