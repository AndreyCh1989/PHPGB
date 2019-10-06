<?php

namespace app\models;

use app\engine\{Session};
use app\models\{Basket};

class User extends Model
{
    public function __construct($login = null, $pass = null) {
        $this->login = $login;
        $this->pass = $pass;

        $this->clearUpdated();
    }

    public static function getTableName(): string
    {
        return 'users';
    }

    public static function auth($login, $pass) {
        $user = User::getWhere('login', $login);
        if (password_verify($pass, $user->pass)) {
            Session::getInstance()->login = $login;
            Session::getInstance()->id = $user->id;

            $hash = uniqid(rand(), true);

            $user->hash = $hash;
            $user->save();
            Session::getInstance()->hash = $hash;

            Basket::moveToUserBasket($user);

            return true;
        }
        return false;
    }

    public static function isAuth() {
        if (Session::getInstance()->hash) {
            $user = User::getWhere('hash', Session::getInstance()->hash);
            if ($user) return true;
        }

        return false;
    }

    public static function isAdmin() {
        $user = User::getOne(Session::getInstance()->id);
        return $user->is_admin;
    }

    public static function getName() {
        return static::isAuth() ? Session::getInstance()->login : "Guest";
    }
}
