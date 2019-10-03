<?php

namespace app\controllers;

use app\models\Product;

class ProductController extends Controller
{
    public function actionIndex($requestParams) {
        $this->actionCatalog($requestParams);
    }

    public function actionCatalog($requestParams) {
        $pageItemsCount = 10;
        $page = 1;

        if (array_key_exists('page', $requestParams) && $requestParams['page'] > 1) {
            $page = $requestParams['page'];
        }

        $catalog = Product::getRange(0, $pageItemsCount * $page);
        echo $this->render('catalog', ['catalog' => $catalog, 'page' => $page]);
    }

    public function actionCard($requestParams) {
        $id = $requestParams['id'];
        $product = Product::getOne($id);
        echo $this->render('card', ['product' => $product]);
    }
}
