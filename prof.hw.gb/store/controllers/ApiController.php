<?php

namespace app\controllers;


use app\engine\{Request, Session};
use app\models\Basket;

class ApiController extends Controller
{
    public function actionAddBasket($requestParams) {
        $basket = new Basket(session_id(), $requestParams['id'], Session::getInstance()->id);
        $basket->save();

        $response = [
            'result' => 1,
            'count' => Basket::getCountWhere('session_id', session_id())
        ];
        header('Content-Type: application/json');
        echo json_encode($response);
        exit;
    }

    public function actionDeleteBasket($requestParams) {
        $basket = Basket::getOne($requestParams['id']);
        $basket->delete();

        $response = [
            'result' => 1,
            'count' => Basket::getCountWhere('session_id', session_id())
        ];
        header('Content-Type: application/json');
        echo json_encode($response);
        exit;
    }
}
