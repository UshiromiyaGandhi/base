<?php

use yii\db\Migration;

class m240401_145502_create_table_order_item extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%order_item}}',
            [
                'id' => $this->primaryKey(),
                'orderid' => $this->integer(),
                'productvariantid' => $this->integer(),
                'count' => $this->integer(),
            ],
            $tableOptions
        );

        $this->createIndex('productvariantid', '{{%order_item}}', ['productvariantid']);

        $this->addForeignKey(
            'order_item_ibfk_1',
            '{{%order_item}}',
            ['orderid'],
            '{{%order}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
        $this->addForeignKey(
            'order_item_ibfk_2',
            '{{%order_item}}',
            ['productvariantid'],
            '{{%product_variant}}',
            ['id'],
            'NO ACTION',
            'NO ACTION'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%order_item}}');
    }
}
