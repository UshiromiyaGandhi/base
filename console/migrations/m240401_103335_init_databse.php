<?php

use yii\db\Schema;
use jamband\schemadump\Migration;

class m240401_103335_init_databse extends Migration
{
    public function safeUp()
    {
// auth_assignment
	    $this->createTable('{{%auth_assignment}}', [
		    'item_name' => $this->string(64)->notNull(),
		    'user_id' => $this->string(64)->notNull(),
		    'created_at' => $this->integer()->null(),
		    'PRIMARY KEY (item_name, user_id)',
	    ], $this->tableOptions);

// auth_item
	    $this->createTable('{{%auth_item}}', [
		    'name' => $this->string(64)->notNull(),
		    'type' => $this->smallInteger()->notNull(),
		    'description' => $this->text()->null(),
		    'rule_name' => $this->string(64)->null(),
		    'data' => $this->binary()->null(),
		    'created_at' => $this->integer()->null(),
		    'updated_at' => $this->integer()->null(),
		    'PRIMARY KEY (name)',
	    ], $this->tableOptions);

// auth_item_child
	    $this->createTable('{{%auth_item_child}}', [
		    'parent' => $this->string(64)->notNull(),
		    'child' => $this->string(64)->notNull(),
		    'PRIMARY KEY (parent, child)',
	    ], $this->tableOptions);

// auth_rule
	    $this->createTable('{{%auth_rule}}', [
		    'name' => $this->string(64)->notNull(),
		    'data' => $this->binary()->null(),
		    'created_at' => $this->integer()->null(),
		    'updated_at' => $this->integer()->null(),
		    'PRIMARY KEY (name)',
	    ], $this->tableOptions);

// menu
	    $this->createTable('{{%menu}}', [
		    'id' => $this->primaryKey(),
		    'name' => $this->string(128)->notNull(),
		    'parent' => $this->integer()->null(),
		    'route' => $this->string(255)->null(),
		    'order' => $this->integer()->null(),
		    'data' => $this->binary()->null(),
	    ], $this->tableOptions);

// order
	    $this->createTable('{{%order}}', [
		    'id' => $this->primaryKey(),
		    'fullname' => $this->string(255)->null(),
		    'phonenum' => $this->string(255)->null(),
		    'address' => $this->string(255)->null(),
		    'message' => $this->string(255)->null(),
		    'processed' => $this->boolean()->null()->defaultValue(0),
		    'paymentproof' => $this->string(255)->null(),
	    ], $this->tableOptions);

// order_item
	    $this->createTable('{{%order_item}}', [
		    'id' => $this->primaryKey(),
		    'orderid' => $this->integer()->null(),
		    'productvariantid' => $this->integer()->null(),
		    'count' => $this->integer()->null(),
	    ], $this->tableOptions);

// order_item_product
	    $this->createTable('{{%order_item_product}}', [
		    'id' => $this->primaryKey(),
		    'orderid' => $this->integer()->null(),
		    'productid' => $this->integer()->null(),
		    'count' => $this->integer()->null(),
	    ], $this->tableOptions);

// product
	    $this->createTable('{{%product}}', [
		    'id' => $this->primaryKey(),
		    'sellerId' => $this->integer()->notNull(),
		    'name' => $this->string(255)->null(),
		    'description' => $this->string(255)->null(),
		    'active' => $this->smallInteger()->notNull()->defaultValue(1),
		    'cost' => $this->integer()->null(),
	    ], $this->tableOptions);

// product_image
	    $this->createTable('{{%product_image}}', [
		    'id' => $this->primaryKey(),
		    'productid' => $this->integer()->null(),
		    'filename' => $this->string(255)->null(),
		    'order' => $this->integer()->null(),
	    ], $this->tableOptions);

// product_variant
	    $this->createTable('{{%product_variant}}', [
		    'id' => $this->primaryKey(),
		    'productid' => $this->integer()->null(),
		    'name' => $this->string(255)->null(),
		    'description' => $this->string(255)->null(),
		    'stock' => $this->integer()->null(),
		    'cost' => $this->decimal(10)->null()->comment('IDR'),
		    'count' => $this->integer()->null(),
		    'image' => $this->string(255)->null(),
	    ], $this->tableOptions);

// shop
	    $this->createTable('{{%shop}}', [
		    'id' => $this->primaryKey(),
		    'userid' => $this->integer()->null()->unique(),
		    'name' => $this->string(255)->null(),
		    'description' => $this->string(255)->null(),
		    'qrisimage' => $this->string(255)->null(),
		    'profileimage' => $this->string(255)->null(),
		    'active' => $this->boolean()->notNull()->defaultValue(1),
	    ], $this->tableOptions);

// transaction
	    $this->createTable('{{%transaction}}', [
		    'id' => $this->primaryKey(),
		    'orderid' => $this->integer()->null(),
		    'paymentproof' => $this->string(255)->null(),
		    'datetimeorder' => $this->datetime()->null(),
	    ], $this->tableOptions);

// user
	    $this->createTable('{{%user}}', [
		    'id' => $this->primaryKey(),
		    'username' => $this->string(32)->notNull(),
		    'auth_key' => $this->string(32)->notNull(),
		    'password_hash' => $this->string(255)->notNull(),
		    'password_reset_token' => $this->string(255)->null(),
		    'email' => $this->string(255)->notNull(),
		    'status' => $this->smallInteger()->notNull()->defaultValue(10),
		    'created_at' => $this->integer()->notNull(),
		    'updated_at' => $this->integer()->notNull(),
	    ], $this->tableOptions);

// fk: auth_assignment
	    $this->addForeignKey('fk_auth_assignment_item_name', '{{%auth_assignment}}', 'item_name', '{{%auth_item}}', 'name');

// fk: auth_item
	    $this->addForeignKey('fk_auth_item_rule_name', '{{%auth_item}}', 'rule_name', '{{%auth_rule}}', 'name');

// fk: auth_item_child
	    $this->addForeignKey('fk_auth_item_child_parent', '{{%auth_item_child}}', 'parent', '{{%auth_item}}', 'name');
	    $this->addForeignKey('fk_auth_item_child_child', '{{%auth_item_child}}', 'child', '{{%auth_item}}', 'name');

// fk: menu
	    $this->addForeignKey('fk_menu_parent', '{{%menu}}', 'parent', '{{%menu}}', 'id');

// fk: order_item
	    $this->addForeignKey('fk_order_item_orderid', '{{%order_item}}', 'orderid', '{{%order}}', 'id');
	    $this->addForeignKey('fk_order_item_productvariantid', '{{%order_item}}', 'productvariantid', '{{%product_variant}}', 'id');

// fk: order_item_product
	    $this->addForeignKey('fk_order_item_product_orderid', '{{%order_item_product}}', 'orderid', '{{%order}}', 'id');
	    $this->addForeignKey('fk_order_item_product_productid', '{{%order_item_product}}', 'productid', '{{%product}}', 'id');

// fk: product
	    $this->addForeignKey('fk_product_sellerId', '{{%product}}', 'sellerId', '{{%shop}}', 'id');

// fk: product_image
	    $this->addForeignKey('fk_product_image_productid', '{{%product_image}}', 'productid', '{{%product}}', 'id');

// fk: product_variant
	    $this->addForeignKey('fk_product_variant_productid', '{{%product_variant}}', 'productid', '{{%product}}', 'id');

// fk: shop
	    $this->addForeignKey('fk_shop_userid', '{{%shop}}', 'userid', '{{%user}}', 'id');

// fk: transaction
	    $this->addForeignKey('fk_transaction_orderid', '{{%transaction}}', 'orderid', '{{%order}}', 'id');
    }

    public function safeDown()
    {
    }
}
