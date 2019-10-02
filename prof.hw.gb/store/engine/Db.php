<?php

namespace app\engine;

use app\traits\Tsingletone;

class Db
{
    private $connection;

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

        if (!is_null($className))
            $pdoStatement->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, $className);

        $pdoStatement->execute($params);
        return $pdoStatement;
    }

    public function execute($sql, $params = []) {
        $pdoStatement = $this->getConnection()->prepare($sql);
        return $pdoStatement->execute($params);
    }

    public function queryOne($className, $sql, $params = []) {
        return $this->query($className, $sql, $params)->fetchAll()[0];
    }

    public function queryAll($sql, $params = []) {
        return $this->query(null, $sql, $params)->fetchAll();
    }

    public function queryLimit($sql, $from, $to) {
        $pdoStatement = $this->getConnection()->prepare($sql);

        $pdoStatement->bindParam(':from', $from, \PDO::PARAM_INT);
        $pdoStatement->bindParam(':to', $to, \PDO::PARAM_INT);
        $pdoStatement->execute();

        return $pdoStatement->fetchAll();
    }

    public function lastInsertId() {
        return $this->getConnection()->lastInsertId();
    }
}
