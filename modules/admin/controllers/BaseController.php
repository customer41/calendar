<?php

namespace app\modules\admin\controllers;

use yii\web\Controller;
use Yii;
use yii\web\ForbiddenHttpException;

class BaseController extends Controller
{
    public function beforeAction($action)
    {
        if (!Yii::$app->user->can('adminAccess')) {
            throw new ForbiddenHttpException('Доступ запрещён. Админ-панель.');
        }
        return parent::beforeAction($action);
    }
}