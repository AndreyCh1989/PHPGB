<?php

namespace app\controllers;

use app\models\User;

class UserController extends Controller
{
    public function actionLogin($requestParams) {
        if (isset($requestParams['submit'])) {
            $login = $requestParams['login'];
            $pass = $requestParams['pass'];
            if (!User::auth($login, $pass)) {
                Die("Не верный пароль!");
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
