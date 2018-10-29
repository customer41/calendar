<?php

namespace app\models;

class Event extends EventBase
{
    public function attributeLabels()
    {
        return [
            'title' => 'Название события',
            'description' => 'Описание события',
            'start' => 'Дата начала',
            'finish' => 'Дата завершения',
            'address' => 'Место назначения',
            'isRepeat' => 'Повтор события',
            'isBlock' => 'Блокировка события',
        ];
    }

    public function rules()
    {
        return [
            [['title', 'description', 'address'], 'required'],
            [['isRepeat', 'isBlock'], 'boolean'],
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