<?php

namespace app\controllers;

use app\models\Event;
use Yii;
use yii\web\ForbiddenHttpException;

class EventsController extends BaseController
{
    public function actionIndex()
    {
        if (!Yii::$app->user->can('viewEvent')) {
            throw new ForbiddenHttpException('Доступ запрещён. Просмотр событий.');
        }
        $events = Event::find()->andWhere('userId=' . Yii::$app->user->id)->orderBy('start')->all();
        return $this->render('index', ['events' => $events]);
    }

    public function actionOne($id = null)
    {
        if (!Yii::$app->user->can('viewEvent')) {
            throw new ForbiddenHttpException('Доступ запрещён. Просмотр события.');
        }
        $event = Event::findOne(['id' => $id]);
        return $this->render('one', ['event' => $event]);
    }

    public function actionCreate()
    {
        if (!Yii::$app->user->can('createEvent')) {
            throw new ForbiddenHttpException('Доступ запрещён. Создание события.');
        }
        $event = new Event();
        if (Yii::$app->request->isPost) {
            $event->load(Yii::$app->request->post());
            $event->userId = Yii::$app->user->id;
            if ($event->save()) {
                return $this->redirect('/events/index');
            }
        }
        return $this->render('create', ['event' => $event]);
    }

    public function actionEdit($id = null)
    {
        $event = Event::findOne(['id' => $id]);
        if (!Yii::$app->user->can('editEvent', ['event' => $event])) {
            throw new ForbiddenHttpException('Доступ запрещён. Редактирование события.');
        }
        if (Yii::$app->request->isPost) {
            $event->load(Yii::$app->request->post());
            $event->fillFieldUpdated();
            if ($event->save()) {
                return $this->redirect('/events/index');
            }
        }
        return $this->render('edit', ['event' => $event]);
    }

    public function actionDelete($id = null)
    {
        if (!Yii::$app->user->can('deleteEvent')) {
            throw new ForbiddenHttpException('Доступ запрещён. Удаление события.');
        }
        $event = Event::findOne(['id' => $id]);
        $event->delete();
        return $this->redirect('/events/index');
    }
}