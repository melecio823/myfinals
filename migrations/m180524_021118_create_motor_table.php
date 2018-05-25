<?php

use yii\db\Migration;

/**
 * Handles the creation of table `motor`.
 */
class m180524_021118_create_motor_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('motorcycles', [
            'id' => $this->primaryKey(),
            'motor_name' => $this->string(191)->notNull(),
            'model' => $this->string(191)->notNull(),
            'description' => $this->string(255),
            'price' => $this->money()->notNull(),
            'quantity' => $this->integer()->notNull(),
            ]);     
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('motorcycles');
    }
}
