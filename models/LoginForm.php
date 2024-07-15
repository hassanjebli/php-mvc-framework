<?php

namespace app\models;

use app\core\Application;
use app\core\Model;

/**
 * @package app\models
 */

class LoginForm extends Model
{
    public string $email = '';
    public string $password = '';
    function rules(): array
    {
        return [
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL],
            'password' => [self::RULE_REQUIRED]
        ];
    }
    function login()
    {
        $user = User::findOne(['email' => $this->email]);
        if (!$user) {
            $this->addError('email', 'User doesn\'t exist with this email');
            return false;
        }
        if (!password_verify($this->password, $user->password)) {
            $this->addError('password', 'password is incorrect');
            return false;
        }
        return Application::$app->login($user);
    }
    function labels(): array
    {
        return [
            'email' => 'Your Email',
            'password' => 'Password'
        ];
    }
}
