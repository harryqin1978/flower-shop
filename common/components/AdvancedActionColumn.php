<?php

namespace common\components;

use yii\grid\ActionColumn;
use yii\helpers\Url;

class AdvancedActionColumn extends ActionColumn
{
    /**
     * @inheritdoc
     */
    public function createUrl($action, $model, $key, $index)
    {
        if (is_callable($this->urlCreator)) {
            return call_user_func($this->urlCreator, $action, $model, $key, $index, $this);
        } else {
            $params = is_array($key) ? $key : ['id' => (string) $key];
            if ($action == 'update') {
                $params['redirect-url'] = Url::current();
            }
            $params[0] = $this->controller ? $this->controller . '/' . $action : $action;
            return Url::toRoute($params);
        }
    }
}