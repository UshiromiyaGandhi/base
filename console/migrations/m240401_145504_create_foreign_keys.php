<?php

use yii\db\Migration;

class m240401_145504_create_foreign_keys extends Migration
{
    public function safeUp()
    {
        $this->addForeignKey(
            'menu_ibfk_1',
            '{{%menu}}',
            ['parent'],
            '{{%menu}}',
            ['id'],
            'SET NULL',
            'CASCADE'
        );
    }

    public function safeDown()
    {
        $this->dropForeignKey('menu_ibfk_1', '{{%menu}}');
    }
}
