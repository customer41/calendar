<?php

use yii\db\Migration;

class m181028_031224_createEventsTable extends Migration
{
    public function up()
    {
        $this->createTable('events', [
            'id' => $this->primaryKey(),
            'title' => $this->string(),
            'description' => $this->text(),
            'start' => $this->dateTime(),
            'finish' => $this->dateTime(),
            'address' => $this->string(),
            'isRepeat' => $this->boolean(),
            'isBlock' => $this->boolean(),
        ]);
    }

    public function down()
    {
        $this->dropTable('events');
    }
}
