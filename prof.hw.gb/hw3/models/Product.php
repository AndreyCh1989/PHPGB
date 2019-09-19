<?php

namespace app\models;

class Product extends Model
{
    public $id;
    public $name;
    public $description;
    public $price;

    public function __construct($name, $price, $description = null) {
        $this->name = $name;
        $this->price = $price;
        $this->description = $description;
    }

    public function getId(): int {
        return $this->id;
    }

    public static function getTableName(): string
    {
        return 'product';
    }
}
