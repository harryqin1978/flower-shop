<?php
use yii\helpers\Html;

$i = 0;
foreach ($orders as $order) {
    $i ++;
?>
    <div style="width: 640px; border: 1px solid black; margin-bottom: 10px; height: 250px; padding: 10px; overflow: hidden;">
        <div style="border-bottom: 1px dotted #333; padding-bottom: 8px; margin-bottom: 8px; color: #900; font-weight: bold;">鲜花配送单 编号：<?= $order->id ?></div>
        送花时间：<?= $order->send_date ?>&nbsp;<br />
        收花人姓名：<?= Html::encode($order->receiver_name) ?><br />
        收花人电话：<?= Html::encode($order->receiver_mobile) ?><br />
        收花人地址：<?= Html::encode($order->receiver_address) ?><br />
        买家电话：<?= Html::encode($order->buyer_mobile) ?><br />
        花束内容：<?= Html::encode($order->description) ?><br />
        卡片留言：<?= $order->card_info ? '有' : '无' ?><br />
        <div style="border-top: 1px dotted #333; padding-top: 30px; margin-top: 8px;">收花人签收：____________________________</div>
    </div>
    <?php
    if ($i % 3 == 0) {
    ?>
        <div style="page-break-after: always; clear: both;"></div>
    <?php
    }
    ?>
<?php
}
?>