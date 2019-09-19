<?php

namespace app\engine;

use app\traits\Tsingletone;

class Db
{
    private $config = [
        'driver' => 'mysql',
        'host' => 'localhost',
        'port' => '3307',
        'login' => 'root',
        'password' => '',
        'database' => 'store',
        'charset' => 'utf8'
    ];

    use TSingletone;

    private function getConnection() {
        if (is_null($this->connection)) {
            $this->connection =  new \PDO($this->prepareDSNstring(),
                $this->config['login'],
                $this->config['password']);

            $this->connection->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
        }
       return $this->connection;
    }

    private function prepareDSNstring() {
        return sprintf('%s:host=%s;port=%s;dbname=%s;charset=%s',
            $this->config['driver'],
            $this->config['host'],
            $this->config['port'],
            $this->config['database'],
            $this->config['charset']
        );
    }

    private function query($className, $sql, $params) {
        $pdoStatement = $this->getConnection()->prepare($sql);
        $pdoStatement->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, $className, array('', '', '', '', '', '')); // dirty hack
        $pdoStatement->execute($params);
        return $pdoStatement;
    }

    public function execute($sql, $params = []) {
        $pdoStatement = $this->getConnection()->prepare($sql);
        return $pdoStatement->execute($params);
    }

    public function queryOne($className, $sql, $params = []) {
        return $this->queryAll($className, $sql, $params)[0];
    }

    public function queryAll($className, $sql, $params = []) {
        return $this->query($className, $sql, $params)->fetchAll();
    }

    public function lastInsertId() {
        return $this->getConnection()->lastInsertId();
    }
}
