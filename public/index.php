<?php

$request_uri = $_SERVER['REQUEST_URI'];

if (strpos($request_uri, "/api/") === 0) {
    // 🚀 Configuração para APIs
    header('Content-Type: application/json; charset=utf-8');
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
    header('Access-Control-Allow-Headers: Content-Type, Authorization');

    require_once __DIR__ . '/../routes/usuario-api.php';
    require_once __DIR__ . '/../routes/cliente-api.php';
    require_once __DIR__ . '/../routes/produto-api.php';
    exit;
}

require_once __DIR__ . '/../public/web.php';

?>
