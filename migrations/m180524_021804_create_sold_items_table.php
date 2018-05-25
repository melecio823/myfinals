<?php

use yii\db\Migration;

/**
 * Handles the creation of table `sold_items`.
 */
class m180524_021804_create_sold_items_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('sold_items', [
           'id' => $this->primaryKey(),
           'motorcycle_id' => $this->integer()->notNull(),
           'sales_id' => $this->integer()->notNull(),
           'quantity' => $this->integer()->notNull(),
           'amount' => $this->money()->notNull()
       ]);
         $this->createIndex(
           'idx-sold_items-motorcycle_id',
           'sold_items','motorcycle_id');
       $this->addForeignKey(
           'fk-sold_items-motorcycles',
           'sold_items', 'motorcycle_id',
           'motorcycles','id'
       );

       $this->createIndex(
           'idx-sold_items-sales_id',
           'sold_items', 'sales_id'
       );
       $this->addForeignKey(
           'fk-sold_items-sales',
           'sold_items','sales_id',
           'sales', 'id'
       );
   }

   /**
    * {@inheritdoc}
    */
   public function safeDown()
   {
      $this->dropForeignKey('fk-sold_items-motorcycles', 'sold_items');
       $this->dropForeignKey('fk-sold_items-sales', 'sold_items');
       $this->dropIndex('idx-sold_items-motorcycle_id', 'sold_items');
       $this->dropIndex('idx-sold_items-sales_id', 'sold_items');
       $this->dropTable('sold_items');
   }
}
