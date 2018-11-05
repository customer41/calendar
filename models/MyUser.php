<?php

namespace app\models;

use yii\helpers\ArrayHelper;
use yii\web\IdentityInterface;

class MyUser extends MyUserBase implements IdentityInterface
{
    public $rePassword;

    public function attributeLabels()
    {
        $labels = parent::attributeLabels();
        $labels['username'] = 'Имя пользователя';
        $labels['password'] = 'Пароль';
        $labels['rePassword'] = 'Повтор пароля';
        return $labels;
    }

    public function rules()
    {
        return ArrayHelper::merge([
            [['password', 'email', 'rePassword'], 'required'],
            ['rePassword', 'compare', 'compareAttribute' => 'rePassword'],
        ],
            parent::rules()
        );
    }

    public static function findIdentity($id)
    {
        return MyUser::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return null;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        return $this->authKey;
    }

    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() == $authKey;
    }

    public function validatePassword($password)
    {
        return \Yii::$app->security->validatePassword($password, $this->password);
    }
}