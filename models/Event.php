<?php

namespace app\models;

use app\behaviors\FillFieldsBehavior;
use yii\db\Query;
use yii\helpers\ArrayHelper;

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

    public function behaviors()
    {
        return [
            'fillFields' => [
                'class' => FillFieldsBehavior::class,
                'created' => 'created',
                'updated' => 'updated',
            ]
        ];
    }

    public function rules()
    {
        return ArrayHelper::merge([
            [['description', 'address', 'start'], 'required'],
            [['isRepeat', 'isBlock'], 'boolean'],
            [['start', 'finish'], 'datetime'],
            ['start', 'filter', 'filter' => function($value) {
                return \Yii::$app->formatter->asDatetime($value, 'yyyy-MM-dd HH:mm');
            }],
            ['finish', 'default', 'value' => function($model, $attribute) {
                return $model->$attribute = $model->start;
            }],
            ['finish', 'filter', 'filter' => function($value) {
                    return \Yii::$app->formatter->asDatetime($value, 'yyyy-MM-dd HH:mm');
                }, 'when' => function($model) {
                    return null != $model->finish;
            }],
            ['start', function () {
                if (strtotime($this->start) > strtotime($this->finish)) {

                    $this->addError('start', '"Дата начала" больше "даты завершения"');
                    $this->addError('finish', '"Дата завершения" меньше "даты начала"');
                }
            }],
            [['start', 'finish'], function() {
                if (strtotime($this->start) < time()) {
                    $this->addError('start', '"Дата начала" не может быть меньше текущей даты');
                }
                if (strtotime($this->finish) < time()) {
                    $this->addError('finish', '"Дата завершения" не может быть меньше текущей даты');
                }
            }],
            [['start', 'finish'], 'blockEvent'],
        ],
            parent::rules());
    }

    public function blockEvent($attribute)
    {
        $query = new Query();
        $data = $query
            ->select('start, finish')
            ->from('events')
            ->andWhere('`start` > current_date()')
            ->andWhere('`isBlock` = 1')
            ->createCommand()
            ->queryAll();
        $dates = [];
        foreach ($data as $datesRow) {
            foreach ($datesRow as $date) {
                $dates[] = substr($date, 0, 10);
            }
        }
        $dates = array_unique($dates);
        $date = substr($this->$attribute, 0, 10);
        if (in_array($date, $dates)) {
            $this->addError($attribute, 'На указанную дату запланировано блокирующее событие');
        }
    }
}