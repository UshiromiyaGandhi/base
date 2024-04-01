<?php

use yii\db\Migration;

class m240401_145500_create_table_product_image extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%product_image}}',
            [
                'id' => $this->primaryKey(),
                'productid' => $this->integer(),
                'filename' => $this->string(),
                'order' => $this->integer(),
            ],
            $tableOptions
        );

        $this->addForeignKey(
            'product_image_ibfk_1',
            '{{%product_image}}',
            ['productid'],
            '{{%product}}',
            ['id'],
            'CASCADE',
            'CASCADE'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%product_image}}');
    }
}
