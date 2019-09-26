<?php

namespace app\models;

class Cart extends Model
{
    public $id;
    public $orders = [];

    public function getTableName(): string
    {
        return 'cart';
    }
}
