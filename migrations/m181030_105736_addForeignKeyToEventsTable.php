<?php

use yii\db\Migration;

class m181030_105736_addForeignKeyToEventsTable extends Migration
{
    public function safeUp()
    {
        $this->addColumn('events', 'userId', $this->integer()->notNull());
        $this->addForeignKey('userEvent', 'events', 'userId', 'users', 'id', 'CASCADE', 'CASCADE');
    }

    public function safeDown()
    {
        $this->dropColumn('events', 'userId');
    }
}
