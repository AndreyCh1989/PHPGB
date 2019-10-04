<?php


namespace app\models;


use app\engine\{Db, Session};
use app\models\{User};

class Basket extends Model
{
    public function __construct($session_id = null, $product_id = null, $user = null)
    {
        $this->session_id = $session_id;
        $this->product_id = $product_id;

        $this->clearUpdated();
    }


    public static function getTableName(): string
    {
        return 'basket';
    }


    public static function getBasket($session, $user_id)
    {
        $sql = "SELECT p.id id_prod, b.id id_basket, p.name, p.description, p.price, b.user FROM basket b,product p WHERE b.product_id=p.id AND (b.session_id = :session or b.user = :user_id)";

        return Db::getInstance()->queryAll($sql, ['session' => $session, 'user_id' => $user_id]);
    }

    public static function moveToUserBasket(User $user)
    {
        $items = Basket::getAllWhere("session_id", session_id());
        foreach ($items as $item) {
            if (!$item->user) {
                $basket = Basket::getOne($item['id']);
                $basket->user = $user->id;
                $basket->save();
            }
        }
    }
}
