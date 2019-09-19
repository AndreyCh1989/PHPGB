<?php

namespace app\models;

use app\interfaces\IModel;
use app\engine\Db;

abstract class Model implements IModel
{
    public abstract function getId(): int;

    public function insert(): bool {
        $tableName = static::getTableName();
        $params = get_object_vars($this);
        unset($params['id'], $params['db']);

        $columnsStr = implode( ", ", array_keys($params));
        $values = [];
        foreach ($params as $key => $value)
            $values[] =  ':' . $key;
        $valuesStr = implode( ", ", array_values($values));

        $sql = "insert into {$tableName} ({$columnsStr}) values ({$valuesStr})";
        $result = Db::getInstance()->execute($sql, $params);
        $this->id = Db::getInstance()->lastInsertId();
        return $result;
    }

    public function delete(): bool {
        $tableName = static::getTableName();
        $sql = "delete from {$tableName} where id = :id";
        return Db::getInstance()->execute($sql, ['id' => $this->getId()]);
    }

    public function update(): bool {
        $tableName = static::getTableName();
        $params = get_object_vars($this);
        unset($params['id'], $params['db']);

        $values = [];
        foreach ($params as $key => $value)
            $values[] =  "{$key} = :{$key}";
        $valuesStr = implode( ", ", array_values($values));

        $sql = "update {$tableName} set {$valuesStr} where id = {$this->getId()}";
        return Db::getInstance()->execute($sql, $params);
    }

    public static function getOne($id): IModel {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = :id";
        return Db::getInstance()->queryOne(get_called_class(), $sql, ['id' => $id]);
    }

    public static function getAll(): array {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName}";
        return Db::getInstance()->queryAll(get_called_class(), $sql);
    }
}
