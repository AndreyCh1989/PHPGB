<?php

namespace app\models;

class Product extends Model
{
    public function __construct($name = null, $price = null, $description = null) {
        $this->name = $name;
        $this->price = $price;
        $this->description = $description;
        $this->image = '\1.jpg';

        $this->clearUpdated();
    }

    public static function getTableName(): string
    {
        return 'product';
    }
}
