<?php

namespace app\engine;

class Db
{
    public function queryOne($sql, $params = []): string
    {
        return $sql . "<br>";
    }

    public function queryAll($sql, $params = []): string
    {
        return $sql . "<br>";
    }
}
