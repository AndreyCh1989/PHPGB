<?

use app\models\{Product, User, Order, Cart};
use app\engine\{Autoload, Db};

include "../engine/Autoload.php";

spl_autoload_register([new Autoload(), 'loadClass']);

$product = new Product(new Db());
echo $product->getOne(3);

$user = new User(new Db());
echo $user->getAll();

$user = new Cart(new Db());
echo $user->getAll();

$user = new Order(new Db());
echo $user->getAll();
