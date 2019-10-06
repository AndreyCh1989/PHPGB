<?php

namespace app\controllers;


use app\engine\{Request, Session};
use app\models\{Basket, Order};

class ApiController extends Controller
{
    public function actionAddBasket($requestParams) {
        $basket = new Basket(session_id(), $requestParams['id'], Session::getInstance()->id);
        $basket->save();

        $response = [
            'result' => 1,
            'count' => count(Basket::getBasket(session_id(), Session::getInstance()->id))
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
            'count' => count(Basket::getBasket(session_id(), Session::getInstance()->id)),
            'total' => Basket::getTotal(session_id(), Session::getInstance()->id)
        ];
        header('Content-Type: application/json');
        echo json_encode($response);
        exit;
    }

    private function updateOrder($requestParams, $newStatus) {
        $order = Order::getOne($requestParams['id']);
        $order->status = $newStatus;
        $order->save();

        $response = [
            'status' => $order->status
        ];
        header('Content-Type: application/json');
        echo json_encode($response);
        exit;
    }

    public function actionCancelOrder($requestParams) {
        $this->updateOrder($requestParams, 2);
    }

    public function actionShipOrder($requestParams) {
        $this->updateOrder($requestParams, 1);
    }
}
