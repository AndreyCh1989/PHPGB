<?php

namespace app\engine;

use app\traits\Tsingletone;

class Session
{
    use TSingletone;

    public function start() {
        session_start();
    }

    public function kill() {
        session_destroy();
    }

    public function __set($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public function __get($key)
    {
        if (isset($_SESSION[$key])) {
            return $_SESSION[$key];
        } else return null;
    }
}
