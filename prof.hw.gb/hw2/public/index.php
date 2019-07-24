<?php
include $_SERVER['DOCUMENT_ROOT'] . $_SERVER['REQUEST_URI'] . '/../services/Autoload.php';

use App\models\Car;
use App\services\BD;
use App\services\Autoload;

spl_autoload_register(
    [new Autoload(), 'loadClass']
);

$car = new Car(new BD());
$car->getOne(1);
//
//echo '<br>';
//
//$house = new House(new BD());
//$house->getOne(1);

