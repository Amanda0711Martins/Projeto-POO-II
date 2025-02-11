<?php
// Se for um arquivo real, carrega ele
if (php_sapi_name() === 'cli-server') {
    $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $file = __DIR__ . "/public" . $path;
    if (is_file($file)) {
        return false;
    }
}

// Carrega a API
require __DIR__ . '/public/index.php';