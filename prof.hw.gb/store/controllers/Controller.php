<?php

namespace app\controllers;

use app\interfaces\IRenderer;
use app\models\{Basket, User};
use app\engine\{Session};

abstract class Controller
{
    private $action;
    private $defaultAction = "index";
    private $layout = 'main';
    private $useLayouts = true;
    private $renderer;

    public function __construct(IRenderer $renderer) {
        $this->renderer = $renderer;
    }

    public function runAction($action = null, $params = []) {
        $this->action = $action ?: $this->defaultAction;
        $method = "action" . ucfirst($this->action);
        if (method_exists($this, $method)) {
            $this->$method($params);
        } else {
            echo "404";
        }
    }

    public function render($template, $params = []) {
        if ($this->useLayouts) {
            return $this->renderer->renderTemplate("layouts/{$this->layout}", [
                'content' => $this->renderer->renderTemplate($template, $params),
                'auth' => User::isAuth(),
                'username' => User::getName(),
                'menu' => $this->renderer->renderTemplate('menu', [
                    'count' => count(Basket::getBasket(session_id(), Session::getInstance()->id))
                ])
            ]);
        } else {
            return $this->renderer->renderTemplate($template, $params);
        }
    }
}
