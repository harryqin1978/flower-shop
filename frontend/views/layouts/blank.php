<?php
use yii\helpers\Html;

$this->title = Yii::t('app', 'Print Order');
?>
<!doctype html>
<html>
    <head>
        <title><?= Html::encode($this->title) ?></title>
        <style>
            body {font-size: 12px;}
        </style>
    </head>
    <body>
        <?= $content ?>
    </body>
</html>