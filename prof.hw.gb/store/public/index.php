<?

session_start();

use app\engine\autoloaders\{Autoload};
use app\models\{Product, User, Order, Cart};
use app\engine\{Db, Render, TwigRender, Request};

include "../config/config.php";
include "../engine/autoloaders/Autoload.php";

spl_autoload_register([new Autoload(), 'loadClass']);

$request = new Request();

$controllerName = $request->getControllerName() ?: 'product';
$actionName = $request->getActionName();

$controllerClass = CONTROLLER_NAMESPACE . ucfirst($controllerName)  . "Controller";

if (class_exists($controllerClass)) {
    $controller = new $controllerClass(new Render());
    $controller->runAction($actionName, $request->getParams());
} else {
    echo "No such controller";
}

//$product = new Product('Ботиночки', 123.23, 'Белые с черной полоской');
//var_dump($product->save());
//$product = new Product('Ботиночки', 10, 'Красные');
//var_dump($product->save());
//$product = new Product('Ботиночки', 432, 'Синие');
//var_dump($product->save());
//$product = new Product('Ботиночки', 654, 'Зеленые');
//var_dump($product->save());
//$product = new Product('Ботиночки', 222);
//var_dump($product->save());
//$product = new Product('Ботиночки', 543);
//var_dump($product->save());
//$product = new Product('Ботиночки', 333);
//var_dump($product->save());
//$product = new Product('Ботиночки', 54);
//var_dump($product->save());
//$product = new Product('Ботиночки', 63);
//var_dump($product->save());
//$product = new Product('Ботиночки', 11);
//var_dump($product->save());
//$product = new Product('Ботиночки', 23);
//var_dump($product->save());
//$product = new Product('Ботиночки', 534);
//var_dump($product->save());
//$product = new Product('Ботиночки', 236);
//var_dump($product->save());
//$product = new Product('Ботиночки', 6346);
//var_dump($product->save());
//$product = new Product('Ботиночки', 457);
//var_dump($product->save());
//$product = new Product('Ботиночки', 456);
//var_dump($product->save());
//$product = new Product('Ботиночки', 33);
//var_dump($product->save());
//$product = new Product('Ботиночки', 66);
//var_dump($product->save());
//$product = new Product('Ботиночки', 444);
//var_dump($product->save());
//$product = new Product('Ботиночки', 111);
//var_dump($product->save());
//var_dump(Product::getOne($product->getId()));
//
//$product->description = 'хреновые';
//var_dump($product->save());
//var_dump(Product::getAll());
//
//var_dump($product->delete());
//var_dump(Product::getAll());
