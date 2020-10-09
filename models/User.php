<?php

namespace app\models;

use Yii;
use yii\web\IdentityInterface;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $login
 * @property string $password
 */
class User extends ActiveRecord implements IdentityInterface
{

    public static function tableName()
    {
        return 'user';
    }

    public function rules()
    {
        return [
            [['login', 'password'], 'required'],
            [['login'], 'string', 'max' => 64],
            [['password'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'login' => 'Login',
            'password' => 'Password',
        ];
    }

    public static function findIdentity($id)
    {
        return self::find()->where(['id' => $id])->one();
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return self::find()->where(["accessToken" => $token])->one();
    }

    public static function findByLogin($login)
    {
        return self::find()->where(["login" => $login])->one();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        return $this->authKey;
    }

    public function getLogin()
    {
        return $this->login;
    }

    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password);
    }
}
