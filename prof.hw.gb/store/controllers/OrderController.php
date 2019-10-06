<?php


namespace app\controllers;


use app\models\{Order, Basket, User};
use app\engine\{Session};

class OrderController extends Controller
{
    public function actionIndex($requestParams)
    {
        $is_admin = User::isAdmin();
        echo $this->render('orders', [
                'orders' => $is_admin ? Order::getAll() : Order::getAllWhere('user', Session::getInstance()->id),
                'is_admin' => $is_admin
            ]);
    }

    public function actionAdd($requestParams)
    {
        $order = new Order(Session::getInstance()->id, $requestParams['name'], $requestParams['email'], Basket::getTotal(session_id, Session::getInstance()->id));
        $order->save();

        Basket::setOrder(session_id, Session::getInstance()->id, $order->getId());

        $this->actionIndex($requestParams);
    }

    public function actionShow($requestParams)
    {
        $id = $requestParams['id'];
        $order = Order::getOne($id);
        echo $this->render('order', ['order' => $order, "items" => $order->getOrderItems()]);
    }
}
