<?php

function autoload($dir, $excludeFiles = []) {
    $files = scandir($dir);
    $excludeFiles = array_merge(['.', '..'], $excludeFiles);
    foreach($files as $file) {
        if (!in_array($file, $excludeFiles)) {
            $filePath = $dir . DIRECTORY_SEPARATOR . $file;

            if (is_dir($filePath)) {
                autoload($filePath, $excludeFiles);
            }

            if ('text/x-php' == mime_content_type($filePath)) {
                require_once($filePath);
            }
        }
    }
}
