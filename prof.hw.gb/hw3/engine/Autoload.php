<?

namespace app\engine;

class Autoload {
    public function loadClass($className) {
        $fileName = str_replace(['app\\', '\\'], ['', DIRECTORY_SEPARATOR], ROOT_DIR . "/{$className}.php");
        include $fileName;
    }
}
