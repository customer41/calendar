<?php

namespace app\widgets\LastURL;

use yii\bootstrap\Widget;
use Yii;

class LastURL extends Widget
{
    protected $lastURL;

    public function init()
    {
        parent::init();
        $this->lastURL = Yii::$app->session->getFlash('previousPage');
    }

    public function run()
    {
        return $this->render('index', ['lastURL' => $this->lastURL]);
    }
}