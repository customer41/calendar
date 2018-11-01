<?php

use yii\db\Migration;

class m181030_101830_createUsersTable extends Migration
{
    public function safeUp()
    {
        $this->createTable('users', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull(),
            'password' => $this->string(),
            'authKey' => $this->string(),
            'accessToken' => $this->string(),
            'email' => $this->string(),
            'status' => $this->integer()->notNull()->defaultValue(0),
            'created' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('users');
    }
}
