<?php

use yii\db\Migration;

class m181028_031224_createEventsTable extends Migration
{
    public function safeUp()
    {
        $this->createTable('events', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'description' => $this->text(),
            'start' => $this->dateTime(),
            'finish' => $this->dateTime(),
            'address' => $this->string(),
            'isRepeat' => $this->boolean()->notNull()->defaultValue(0),
            'isBlock' => $this->boolean()->notNull()->defaultValue(0),
            'created' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated' => $this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('events');
    }
}
