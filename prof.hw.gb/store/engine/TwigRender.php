<?php

namespace app\engine;

use app\interfaces\IRenderer;
use app\engine\autoloaders\{Twig};

require_once '../vendor/autoload.php';

class TwigRender implements IRenderer
{
    public function renderTemplate($template, $params = []) {
        $templateFullName = $template . ".tmpl";

        //var_dump($templateFullName);
        //var_dump($params);

        return Twig::getInstance()->getTwig()->render($templateFullName, $params);
    }
}
