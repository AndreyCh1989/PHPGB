<?php

include $_SERVER['DOCUMENT_ROOT'] .
    '/../services/Autoload.php';

spl_autoload_register(
    [new Autoload(),
        'loadClass']
);

$user = new User(new BD());

$user->getOne(12);
$good = (new Good(new BD()))->getAll();

var_dump($good);
var_dump($user->calc([1,15,456,456]));


