<?

use app\models\{Product, User, Order, Cart};
use app\engine\{Autoload, Db};

include "../config/config.php";
include "../engine/Autoload.php";

spl_autoload_register([new Autoload(), 'loadClass']);

$product = new Product('Ботиночки', 123.23);
var_dump($product->insert());
var_dump(Product::getAll());

$product->description = 'хреновые';
var_dump($product->update());
var_dump(Product::getAll());

var_dump($product->delete());
var_dump(Product::getAll());

