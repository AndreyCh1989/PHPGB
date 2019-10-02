<?php

namespace app\controllers;

use app\models\User;

class UserController extends Controller
{
    public function actionIndex($requestParams) {
        $this->actionUsers($requestParams);
    }

    public function actionUsers($requestParams) {
        $users = User::getAll();
        echo $this->render('users', ['users' => $users]);
    }

    public function actionUser($requestParams) {
        $id = $requestParams['id'];
        $user = User::getOne($id);
        echo $this->render('user', ['user' => $user]);
    }
}
