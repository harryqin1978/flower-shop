<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Order */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Orders'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'attribute' => 'user_id',
                'label' => Yii::t('app', 'User'),
                'value' => $model->user->username,
            ],
            [
                'attribute' => 'source_id',
                'label' => Yii::t('app', 'Source'),
                'value' => $model->source->name,
            ],
            'price',
            [
                'attribute' => 'paymethod_id',
                'label' => Yii::t('app', 'Pay method'),
                'value' => $model->paymethod->name,
            ],
            'send_date',
            'description',
            'special',
            'card_info:ntext',
            'hidden_info:ntext',
            'receiver_name',
            'receiver_mobile',
            'receiver_address',
            'buyer_mobile',
            'buyer_identify',
            'cost',
            'created_at',
            'updated_at',
            [
                'label' => Yii::t('app', 'Image'),
                'format' => 'raw',
                'value' => $model->image_url ? '<img src="' . $model->image_url . '" style="max-width: 100%;" />' : '---',
            ],
        ],
    ]) ?>

</div>
