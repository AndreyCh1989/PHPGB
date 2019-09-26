<?php

namespace app\models;

use app\interfaces\IModel;
use app\engine\Db;

abstract class Model extends DBModel
{
    protected $id;
    protected $properties = [];
    protected $updatedProps = [];

    public function __set($key, $value)
    {
        $this->updatedProps[$key] = $value;
        $this->properties[$key] = $value;
    }

    public function getId(): int {
        return $this->id;
    }

    public function __get($key)
    {
        if (property_exists($this, $key))
            return $this->$key;
        elseif (array_key_exists($key, $this->properties))
            return $this->properties[$key];
        else
            echo "There is no key {$key} in {$this->getTableName()}";
    }

    public function clearUpdated() {
        unset($this->updatedProps);
    }
}
