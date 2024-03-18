<?php

use common\rbac\rules\CanUpdateOwnProduct;
use yii\db\Migration;

/**
 * Class m240307_014616_init_rbac
 */
class m240307_014616_init_rbac extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m240307_014616_init_rbac cannot be reverted.\n";

        return false;
    }

    public function up()
    {
			$auth = Yii::$app->authManager;

			$rule = new CanUpdateOwnProduct();
			$auth->add($rule);

    }

    public function down()
    {
        echo "m240307_014616_init_rbac cannot be reverted.\n";

        return false;
    }
}
