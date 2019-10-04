<?php

namespace app\models;

use app\interfaces\IModel;
use app\engine\Db;

abstract class DBModel implements IModel
{
    public function insert(): bool {
        $tableName = static::getTableName();
        $properties = $this->properties;
        $columnsStr = implode( ", ", array_keys($properties));
        $values = [];
        foreach ($properties as $key => $value)
            $values[] =  ':' . $key;
        $valuesStr = implode( ", ", array_values($values));

        $sql = "insert into {$tableName} ({$columnsStr}) values ({$valuesStr})";
        $result = Db::getInstance()->execute($sql, $properties);
        $this->id = Db::getInstance()->lastInsertId();

        return $result;
    }

    public function update(): bool {
        $tableName = static::getTableName();
        $updatedProps = $this->updatedProps;
        $values = [];
        foreach ($updatedProps as $key => $value)
            $values[] =  "{$key} = :{$key}";
        $valuesStr = implode( ", ", array_values($values));

        $sql = "update {$tableName} set {$valuesStr} where id = {$this->getId()}";

        $this->clearUpdated();

        return Db::getInstance()->execute($sql, $updatedProps);
    }

    public function save(): bool {
        if (is_null($this->id))
            return $this->insert();
        else
            return $this->update();
    }

    public function delete(): bool {
        $tableName = static::getTableName();
        $sql = "delete from {$tableName} where id = :id";
        return Db::getInstance()->execute($sql, ['id' => $this->getId()]);
    }

    public static function getOne($id): IModel {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = :id";
        $obj =  Db::getInstance()->queryOne(get_called_class(), $sql, ['id' => $id]);

        $obj->clearUpdated();

        return $obj;
    }

    public static function getAll(): array {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName}";
        return Db::getInstance()->queryAll($sql);
    }

    public static function getRange($from, $to): array {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} limit :from, :to";
        return Db::getInstance()->queryLimit($sql, $from, $to);
    }

    public static function getCountWhere($field, $value): string {
        $tableName = static::getTableName();
        $sql = "SELECT count(*) as count FROM {$tableName} WHERE `$field`=:$field";
        return Db::getInstance()->queryOne(null, $sql, ["$field"=>$value])['count'];
    }

    public function getWhere($field, $value) {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE `$field`=:$field";
        return Db::getInstance()->queryOne(get_called_class(), $sql, ["$field"=>$value]);
    }

    public function getAllWhere($field, $value) {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE `$field`=:$field";
        return Db::getInstance()->queryAll($sql, ["$field"=>$value]);
    }
}
