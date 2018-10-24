<?php

namespace app\models;

use yii\base\Model;

class Day extends Model
{
    /**
     * @var boolean
     */
    public $workDay;
    public $eventsId = [];
}