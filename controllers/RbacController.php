<?php

namespace app\controllers;

use app\rbac\AuthorEventRule;
use yii\web\Controller;

class RbacController extends Controller
{
    public function actionGenerate()
    {
        $authManager = \Yii::$app->authManager;
        $authManager->removeAll();

        $admin = $authManager->createRole('admin');
        $user = $authManager->createRole('user');

        $authManager->add($admin);
        $authManager->add($user);

        $authorEventRule = new AuthorEventRule();
        $authManager->add($authorEventRule);

        $editEvent = $authManager->createPermission('editEvent');
        $editEvent->description = 'Редактирование своего события';
        $editEvent->ruleName = $authorEventRule->name;

        $deleteEvent = $authManager->createPermission('deleteEvent');
        $deleteEvent->description = 'Удаление своего события';
        $deleteEvent->ruleName = $authorEventRule->name;

        $createEvent = $authManager->createPermission('createEvent');
        $createEvent->description = 'Создание события';

        $viewEvent = $authManager->createPermission('viewEvent');
        $viewEvent->description = 'Просмотр событий';

        $adminAccess = $authManager->createPermission('adminAccess');
        $adminAccess->description = 'Доступ в админ-панель';

        $authManager->add($editEvent);
        $authManager->add($deleteEvent);
        $authManager->add($createEvent);
        $authManager->add($viewEvent);
        $authManager->add($adminAccess);

        $authManager->addChild($user, $editEvent);
        $authManager->addChild($user, $deleteEvent);
        $authManager->addChild($user, $createEvent);
        $authManager->addChild($user, $viewEvent);
        $authManager->addChild($admin, $user);
        $authManager->addChild($admin, $adminAccess);

        $authManager->assign($admin, 1);
        $authManager->assign($user, 2);
    }
}