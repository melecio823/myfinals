<?php

use yii\db\Migration;

/**
 * Handles the creation of table `customers`.
 */
class m180524_021252_create_customers_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('customers', [
            'id' => $this->primaryKey(),
            'name' => $this->string(191)->notNull(),
            'address' => $this->string(255)->notNull(),
            'gender' => $this->string(1)->notNull(),
            'phone' => $this->string(255)->notNull(),
            'email' => $this->string(255)->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('customers');
    }
}
