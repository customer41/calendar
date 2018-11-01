<?php

namespace app\controllers;

use app\models\Event;
use Yii;

class EventsController extends BaseController
{
    public function actionIndex()
    {
        $events = Event::find()->all();
        return $this->render('index', ['events' => $events]);
    }

    public function actionOne($id = null)
    {
        $event = Event::findOne(['id' => $id]);
        return $this->render('one', ['event' => $event]);
    }

    public function actionCreate()
    {
        $event = new Event();
        if (Yii::$app->request->isPost) {
            $event->load(Yii::$app->request->post());
            $event->userId = 1;
            if ($event->validate()) {
                $event->save();
                return $this->redirect('/events/index');
            }
        }
        return $this->render('create', ['event' => $event]);
    }

    public function actionEdit($id = null)
    {
        $event = Event::findOne(['id' => $id]);
        if (Yii::$app->request->isPost) {
            $event->load(Yii::$app->request->post());
            if ($event->validate()) {
                $event->save();
                return $this->redirect('/events/index');
            }
        }
        return $this->render('edit', ['event' => $event]);
    }

    public function actionDelete($id = null)
    {
        $event = Event::findOne(['id' => $id]);
        $event->delete();
        return $this->redirect('/events/index');
    }
}