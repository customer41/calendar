<?php

namespace app\behaviors;

use yii\base\Behavior;

class FillFieldsBehavior extends Behavior
{
    public $created;
    public $updated;

    public function fillFieldUpdated()
    {
        $this->owner->{$this->updated} = \Yii::$app->formatter->asDatetime(time(), 'yyyy-MM-dd HH:mm:ss');
    }

    public function fillFieldCreated()
    {
        $this->owner->{$this->created} = \Yii::$app->formatter->asDatetime(time(), 'yyyy-MM-dd HH:mm:ss');
    }
}