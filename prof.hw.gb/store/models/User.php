<?php

namespace app\models;

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
}
