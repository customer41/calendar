<?php

namespace app\controllers;

use app\models\Event;
use Yii;

class EventsController extends BaseController
{
    public function actionOne($id = null)
    {
        // получаем из БД...
        // временная заглушка
        $event = new Event();
        $event->title = 'Курс по yii2';
        $event->description = 'Изучение популярного фреймворка';
        $event->start = '15.11.2018 20:00';
        $event->finish = '15.12.2018 20:00';
        $event->where = 'Дома у монитора';
        $event->repeat = false;
        $event->block = false;

        return $this->render('one', ['event' => $event]);
    }

    public function actionCreate()
    {
        $event = new Event();
        return $this->render('create', ['event' => $event]);
    }

    public function actionSave()
    {
        if (Yii::$app->request->isPost) {
            $event = new Event();
            $event->attributes = Yii::$app->request->post('Event');
            if ($event->validate()) {
                // сохраняем в БД...
                /* временное решение */ return $this->redirect('/events/one');
            } else {
                return $this->render('create', ['event' => $event]);
            }
        } else {
            return $this->redirect('/events/create');
        }
    }
}