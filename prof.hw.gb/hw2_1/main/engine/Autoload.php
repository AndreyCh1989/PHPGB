<?

namespace app\engine;

class Autoload {
    public function loadClass($className) {
        $fileName = str_replace('\\', '/', str_replace('app\\', '', "../{$className}.php"));
        include $fileName;
    }
}
