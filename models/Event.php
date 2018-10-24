<?php

namespace app\models;

use yii\base\Model;

class Event extends Model
{
    public $id;
    public $title;
    public $description;
    public $start;
    public $finish;
    public $where;
    public $repeat;
    public $block;

    public function attributeLabels()
    {
        return [
            'title' => 'Название события',
            'description' => 'Описание события',
            'start' => 'Дата начала',
            'finish' => 'Дата завершения',
            'where' => 'Место назначения',
            'repeat' => 'Повтор события',
            'block' => 'Блокировка события',
        ];
    }

    public function rules()
    {
        return [
            [['title', 'description', 'where'], 'required'],
            [['repeat', 'block'], 'boolean'],
            [['start', 'finish'], 'date', 'format' => 'php:Y-m-d H:i'],
            [['start', 'finish'], 'default', 'value' => date('Y-m-d H:i')],
            ['start', function() {
                if (strtotime($this->start) > strtotime($this->finish)) {
                    $this->addError('start', '"Дата начала" больше "даты завершения"');
                    $this->addError('finish', '"Дата завершения" меньше "даты начала"');
                }
            }],
        ];
    }
}