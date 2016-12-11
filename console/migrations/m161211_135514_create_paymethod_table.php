<?php

use yii\db\Migration;

/**
 * Handles the creation of table `paymethod`.
 */
class m161211_135514_create_paymethod_table extends Migration
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

        $this->createTable('{{%paymethod}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull()->unique(),
            'priority' => $this->integer()->notNull()->defaultValue(0),
        ], $tableOptions);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('{{%paymethod}}');
    }
}
