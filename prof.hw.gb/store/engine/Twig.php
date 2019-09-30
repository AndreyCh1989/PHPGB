<?php

namespace app\engine;

use app\traits\Tsingletone;

require_once '../vendor/autoload.php';

class Twig
{
    private $loader = null;
    private $twig = null;

    use TSingletone;

    public function getTwig() {
        if (is_null($this->loader)) {
            $this->loader = new \Twig\Loader\FilesystemLoader('../templates');
        }

        if (is_null($this->twig)) {
//            $this->twig = new \Twig\Environment($this->loader, [
//                'cache' => '../compilation_cache',
//            ]);
            $this->twig = new \Twig\Environment($this->loader, ['strict_variables' => true]);
        }
        return $this->twig;
    }
}
