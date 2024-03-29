<?php

namespace app\controllers;

use app\models\User;
use app\engine\Session;

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
        Session::getInstance()->kill();
        header("Location: /");
        exit();
    }
}
