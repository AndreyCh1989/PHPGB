<?php


namespace app\controllers;


use app\models\Basket;
use app\engine\{Session};

class BasketController extends Controller
{
    public function actionIndex($requestParams)
    {
        echo $this->render('basket', [
            'products' => Basket::getBasket(session_id(), Session::getInstance()->id)
            ]);
    }
}
