<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\OrderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Orders');
$this->params['breadcrumbs'][] = $this->title;
$this->registerJsFile(
    '@web/js/order-index.js',
    ['depends' => [\yii\web\JqueryAsset::className()]]
);
?>
<div class="order-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Order'), ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a(Yii::t('app', 'Print Order'), ['print', 'ids' => '__ids__'], ['class' => 'btn btn-primary', 'id' => 'btn-print-order']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            // ['class' => 'yii\grid\SerialColumn'],
            [
                'class' => 'yii\grid\DataColumn',
                'header' => '<input type="checkbox" id="order-select-all" value="1" />',
                'format' => 'raw',
                'value' => function ($data) {
                    return '<input type="checkbox" class="order-select" value="' . $data->id . '" />';
                },
            ],
            [
                'class' => 'yii\grid\DataColumn',
                'header' => Yii::t('app', 'Image'),
                'format' => 'raw',
                'value' => function ($data) {
                    return $data->image_url ? '<img src="' . str_replace('uploads/', 'uploads/thumbnail.', $data->image_url) . '" style="height: 50px;" />' : '---';
                },
            ],
            'id',
            'send_date',
            [
                'class' => 'yii\grid\DataColumn',
                'header' => Yii::t('app', 'Address'),
                'attribute' => 'receiver_address',
                'value' => function ($data) {
                    return $data->receiver_address . " [" . $data->receiver_name . "]";
                },
            ],
            // [
            //     'class' => 'yii\grid\DataColumn',
            //     'header' => Yii::t('app', 'User'),
            //     'attribute' => 'user_name',
            //     'value' => function ($data) {
            //         return $data->user->username;
            //     },
            // ],
            [
                'class' => 'yii\grid\DataColumn',
                'header' => Yii::t('app', 'Source'),
                'attribute' => 'source_name',
                'value' => function ($data) {
                    return $data->source->name;
                },
            ],
            'price',
            // 'paymethod_id',
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
