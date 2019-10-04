<?php

namespace app\controllers;

use app\models\User;

class AuthException extends \Exception {}

class UserController extends Controller
{
    public function actionLogin($requestParams) {
        if (isset($requestParams['submit'])) {
            $login = $requestParams['login'];
            $pass = $requestParams['pass'];
            if (!User::auth($login, $pass)) {
                throw new AuthException('Не верный логин или пароль');
            } else {
                header("Location: /");
            }
            exit();
        }
    }

    public function actionLogout($requestParams) {
        session_destroy();
        header("Location: /");
        exit();
    }
}
