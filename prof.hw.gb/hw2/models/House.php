<?php
namespace App\models;

class House extends Model
{
    public $id;
    public $number;
    public $street;
    public $city;

    protected function getTableName()
    {
        return 'house';
    }
}
