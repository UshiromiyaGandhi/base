<?php

use yii\db\Migration;

class m240401_145455_create_table_auth_item extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%auth_item}}',
            [
                'name' => $this->string(64)->notNull()->append('PRIMARY KEY'),
                'type' => $this->smallInteger()->notNull(),
                'description' => $this->text(),
                'rule_name' => $this->string(64),
                'data' => $this->binary(),
                'created_at' => $this->integer(),
                'updated_at' => $this->integer(),
            ],
            $tableOptions
        );

        $this->createIndex('idx-auth_item-type', '{{%auth_item}}', ['type']);
        $this->createIndex('rule_name', '{{%auth_item}}', ['rule_name']);

        $this->addForeignKey(
            'auth_item_ibfk_1',
            '{{%auth_item}}',
            ['rule_name'],
            '{{%auth_rule}}',
            ['name'],
            'SET NULL',
            'CASCADE'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%auth_item}}');
    }
}
