<?php

use yii\db\Migration;

/**
 * Class m190309_090114_create_users
 */
class m190309_090114_create_users extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('users', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull()->unique(),
            'authKey' => $this->string(32)->notNull(),
            'password' => $this->string()->notNull(),
            'email' => $this->string()->notNull()->unique(),
            'accessToken' => $this->string(32)->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // echo "m190309_090114_create_users cannot be reverted.\n";
        $this->dropTable('users');
        // return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190309_090114_create_users cannot be reverted.\n";

        return false;
    }
    */
}
