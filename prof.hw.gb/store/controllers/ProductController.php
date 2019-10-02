<?php

namespace app\controllers;

use app\models\Product;

class ProductController extends Controller
{
    public function actionIndex($params) {
        $this->actionCatalog($params);
    }

    public function actionCatalog($params) {
        $pageItemsCount = 10;
        $page = 1;

        if (array_key_exists('page', $params) && $params['page'] > 1) {
            $page = $params['page'];
        }

        $catalog = Product::getRange(0, $pageItemsCount * $page);
        echo $this->render('catalog', ['catalog' => $catalog, 'page' => $page]);
    }

    public function actionCard($params) {
        $id = $params['id'];
        $product = Product::getOne($id);
        echo $this->render('card', ['product' => $product]);
    }
}
