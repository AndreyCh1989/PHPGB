<?php

namespace app\models;

class Product extends Model
{
    public function __construct(string $name = null, float $price = null, string $description = null) {
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
