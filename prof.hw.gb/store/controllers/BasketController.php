<?php


namespace app\controllers;


use app\models\Basket;

class BasketController extends Controller
{
    public function actionIndex($requestParams)
    {
        echo $this->render('basket', [
            'products' => Basket::getBasket(session_id())]);
    }
}