<?php

namespace app\models;

class Order extends Model
{
    public $id;
    public $product;
    public $quantity;

    public function getTableName(): string
    {
        return 'order';
    }
}
