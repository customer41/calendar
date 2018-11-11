<?php

namespace app\modules\admin\controllers;

class DefaultController extends BaseController
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}
