<?php

namespace app\controllers;

use app\models\User;

class UserController extends Controller
{
    public function actionIndex($params) {
        $this->actionUsers($params);
    }

    public function actionUsers($params) {
        $users = User::getAll();
        echo $this->render('users', ['users' => $users]);
    }

    public function actionUser($params) {
        $id = $params['id'];
        $user = User::getOne($id);
        echo $this->render('user', ['user' => $user]);
    }
}
