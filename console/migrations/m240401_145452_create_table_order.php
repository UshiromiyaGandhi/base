<?php

use yii\db\Migration;

class m240401_145452_create_table_order extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%order}}',
            [
                'id' => $this->primaryKey(),
                'fullname' => $this->string(),
                'phonenum' => $this->string(),
                'address' => $this->string(),
                'message' => $this->string(),
                'processed' => $this->boolean()->defaultValue('0'),
                'paymentproof' => $this->string(),
            ],
            $tableOptions
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%order}}');
    }
}
