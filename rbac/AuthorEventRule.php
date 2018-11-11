<?php

namespace app\rbac;

use yii\rbac\Rule;

class AuthorEventRule extends Rule
{
    public $name = 'authorEventRule';

    public function execute($user, $item, $params)
    {
        return isset($params['event']) ? $params['event']->userId == $user : false;
    }
}