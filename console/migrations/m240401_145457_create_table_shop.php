<?php

use yii\db\Migration;

class m240401_145457_create_table_shop extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%shop}}',
            [
                'id' => $this->primaryKey(),
                'userid' => $this->integer(),
                'name' => $this->string(),
                'description' => $this->string(),
                'qrisimage' => $this->string(),
                'profileimage' => $this->string(),
                'active' => $this->boolean()->notNull()->defaultValue('1'),
            ],
            $tableOptions
        );

        $this->createIndex('userid', '{{%shop}}', ['userid'], true);

        $this->addForeignKey(
            'shop_ibfk_1',
            '{{%shop}}',
            ['userid'],
            '{{%user}}',
            ['id'],
            'NO ACTION',
            'NO ACTION'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%shop}}');
    }
}
