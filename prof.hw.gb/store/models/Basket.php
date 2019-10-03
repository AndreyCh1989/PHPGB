<?php


namespace app\models;


use app\engine\Db;

class Basket extends Model
{
    public function __construct($session_id = null, $product_id = null)
    {
        $this->session_id = $session_id;
        $this->product_id = $product_id;

        $this->clearUpdated();
    }


    public static function getTableName(): string
    {
        return 'basket';
    }


    public static function getBasket($session)
    {
        $sql = "SELECT p.id id_prod, b.id id_basket, p.name, p.description, p.price FROM basket b,product p WHERE b.product_id=p.id AND session_id = :session";

        return Db::getInstance()->queryAll($sql, ['session' => $session]);
    }
}