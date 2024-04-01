<?php

use yii\db\Migration;

class m240401_145459_create_table_product extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%product}}',
            [
                'id' => $this->primaryKey(),
                'sellerId' => $this->integer()->notNull(),
                'name' => $this->string(),
                'description' => $this->string(),
                'active' => $this->smallInteger()->notNull()->defaultValue('1'),
                'cost' => $this->integer(),
            ],
            $tableOptions
        );

        $this->addForeignKey(
            'product_ibfk_1',
            '{{%product}}',
            ['sellerId'],
            '{{%shop}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%product}}');
    }
}
