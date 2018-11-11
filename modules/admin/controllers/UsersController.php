<?php

namespace app\modules\admin\controllers;

use app\models\MyUser;
use Yii;

class UsersController extends BaseController
{
    public function actionAll()
    {
        $users = MyUser::find()->all();
        return $this->render('all', ['users' => $users]);
    }

    public function actionCreate()
    {
        $user = new MyUser();
        if (Yii::$app->request->isPost) {
            $post = Yii::$app->request->post('MyUser');
            $post['password'] = Yii::$app->security->generatePasswordHash($post['password']);
            $post['authKey'] = Yii::$app->security->generateRandomString();
            $user->attributes = $post;
            if ($user->save()) {
                $authManager = Yii::$app->authManager;
                $userRole = $authManager->getRole('user');
                $authManager->assign($userRole, $user->id);
                return $this->redirect('/admin/users/all');
            }
        }
        return $this->render('//site/register', ['user' => $user]);
    }

    public function actionDelete($id = null)
    {
        $user = MyUser::findOne(['id' => $id]);
        $user->delete();
        return $this->redirect('/admin/users/all');
    }
}