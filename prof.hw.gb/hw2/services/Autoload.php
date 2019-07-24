<?php
namespace App\services;

class Autoload
{
    private const CLASS_NAME_REPLACE = 'App\\';

    public function loadClass($className)
    {
        $classPath = str_replace(self::CLASS_NAME_REPLACE, '', $className);
        include $_SERVER['DOCUMENT_ROOT'] . $_SERVER['REQUEST_URI'] . "../{$classPath}.php";
    }
}
