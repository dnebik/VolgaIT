<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class LoginForm extends Model
{
    public $login;
    public $password;
    public $rememberMe = true;


    public function rules()
    {
        return [
            [['login', 'password'], 'required'],
            ['password', 'validatePassword'],
            ['rememberMe', 'boolean'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'login' => 'Логин',
            'password' => 'Пароль',
            'rememberMe' => 'Запомнить меня'
        ];
    }

    public function validatePassword($attribute)
    {
        if (!$this->hasErrors()) {
            $user = User::findByLogin($this->login);
            if (!$user || !$user->validatePassword($this->password)) {
//                error_log(print_r(Yii::$app->security->generatePasswordHash($this->password), true));
                $this->addError($attribute, 'Неверный логин или пароль.');
            } else {
                return true;
            }
        }
        return false;
    }

    public function login()
    {
        if ($this->validate()) {
            $user = User::findByLogin($this->login);
            Yii::$app->user->login($user, $this->rememberMe ? 3600*24*30 : 0);
            return $user;
        }
        return false;
    }
}
