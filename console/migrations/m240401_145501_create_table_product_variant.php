<?php

use yii\db\Migration;

class m240401_145501_create_table_product_variant extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%product_variant}}',
            [
                'id' => $this->primaryKey(),
                'productid' => $this->integer(),
                'name' => $this->string(),
                'description' => $this->string(),
                'stock' => $this->integer(),
                'cost' => $this->decimal()->comment('IDR'),
                'count' => $this->integer(),
                'image' => $this->string(),
            ],
            $tableOptions
        );

        $this->addForeignKey(
            'product_variant_ibfk_1',
            '{{%product_variant}}',
            ['productid'],
            '{{%product}}',
            ['id'],
            'CASCADE',
            'CASCADE'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%product_variant}}');
    }
}
