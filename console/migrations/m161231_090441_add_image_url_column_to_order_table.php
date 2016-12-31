<?php

use yii\db\Migration;

/**
 * Handles adding image_url to table `order`.
 */
class m161231_090441_add_image_url_column_to_order_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('{{%order}}', 'image_url', $this->string());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('{{%order}}', 'image_url');
    }
}
