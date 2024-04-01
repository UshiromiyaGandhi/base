<?php

use yii\db\Migration;

class m240401_145453_create_table_transaction extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable(
            '{{%transaction}}',
            [
                'id' => $this->primaryKey(),
                'orderid' => $this->integer(),
                'paymentproof' => $this->string(),
                'datetimeorder' => $this->dateTime(),
            ],
            $tableOptions
        );

        $this->addForeignKey(
            'transaction_ibfk_2',
            '{{%transaction}}',
            ['orderid'],
            '{{%order}}',
            ['id'],
            'RESTRICT',
            'RESTRICT'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%transaction}}');
    }
}
