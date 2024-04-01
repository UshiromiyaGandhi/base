<?php

use yii\db\Migration;

class m240401_145503_create_table_order_item_product extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%order_item_product}}',
            [
                'id' => $this->primaryKey(),
                'orderid' => $this->integer(),
                'productid' => $this->integer(),
                'count' => $this->integer(),
            ],
            $tableOptions
        );

        $this->createIndex('orderid', '{{%order_item_product}}', ['orderid']);

        $this->addForeignKey(
            'order_item_product_ibfk_1',
            '{{%order_item_product}}',
            ['orderid'],
            '{{%order}}',
            ['id'],
            'NO ACTION',
            'NO ACTION'
        );
        $this->addForeignKey(
            'order_item_product_ibfk_2',
            '{{%order_item_product}}',
            ['productid'],
            '{{%product}}',
            ['id'],
            'CASCADE',
            'CASCADE'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%order_item_product}}');
    }
}
