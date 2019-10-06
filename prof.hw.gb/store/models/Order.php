<?php

namespace app\models;

use app\engine\{Db};

class Order extends Model
{
    public function __construct(int $user = null, string $name = null, string $email = null, $total = null)
    {
        $this->user = $user;
        $this->name = $name;
        $this->email = $email;
        $this->total = $total;

        $this->clearUpdated();
    }

    public static function getTableName(): string
    {
        return 'orders';
    }

    public function getOrderItems()
    {
        $sql = "SELECT p.id id_prod, b.id id_basket, p.name, p.description, p.price, b.user FROM basket b,product p WHERE b.product_id=p.id and b.order_id = :order_id";

        return Db::getInstance()->queryAll($sql, ['order_id' => $this->id]);
    }
}
