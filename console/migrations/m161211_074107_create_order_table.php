<?php

use yii\db\Migration;

/**
 * Handles the creation of table `order`.
 */
class m161211_074107_create_order_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%order}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'source_id' => $this->integer()->notNull(),
            'price' => $this->decimal(11, 2)->notNull(),
            'paymethod_id' => $this->integer()->notNull(),
            'send_date' => $this->date()->notNull(),
            'description' => $this->string()->notNull(),
            'special' => $this->string(),
            'card_info' => $this->text(),
            'hidden_info' => $this->text(),
            'receiver_name' => $this->string()->notNull(),
            'receiver_mobile' => $this->string(50),
            'receiver_address' => $this->string()->notNull(),
            'buyer_mobile' => $this->string(50),
            'buyer_identify' => $this->string(50),
            'cost' => $this->decimal(11, 2)->notNull()->defaultValue(0),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->createIndex('idx_send_date', '{{%order}}', ['send_date']);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('{{%order}}');
    }
}
