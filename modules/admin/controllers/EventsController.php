<?php

namespace app\modules\admin\controllers;

use app\models\MyUser;

class EventsController extends BaseController
{
    public function actionAll()
    {
        $users = MyUser::find()->all();
        return $this->render('all', ['users' => $users]);
    }
}