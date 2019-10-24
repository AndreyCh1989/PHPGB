<?php
    namespace app\engine;

    class Explorer {
        public static function getDirectoryIterator(string $path) {
            return new \DirectoryIterator($path);
        }

        public static function getFolders(string $path) {
            $di = static::getDirectoryIterator($path);
            foreach ($di as $file) {
                if(!$file->isDir() || $file->getFileName() == '.') continue;
                yield $file;
            }
        }

        public static function getFiles(string $path) {
            $di = static::getDirectoryIterator($path);
            foreach ($di as $file) {
                if(!$file->isFile()) continue;
                yield $file;
            }
        }
    }
