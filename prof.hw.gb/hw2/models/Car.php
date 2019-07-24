<?php
namespace App\models;

class Car extends Model
{
    public $id;
    public $number;
    public $mark;
    public $color;

    protected function getTableName()
    {
        return 'car';
    }
}
