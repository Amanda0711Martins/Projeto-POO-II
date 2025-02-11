<?php
// Carrega automaticamente as classes necessárias
require_once __DIR__ . '/../app/Controllers/ClientesController.php';

use app\Controllers\ClientesController;

// Verifica a URL acessada
$request_uri = $_SERVER['REQUEST_URI'];

if ($request_uri === "/clientes") {
    $controller = new ClientesController();
    $clientes = $controller->listarUsuarios();
    require_once __DIR__ . '/../app/Views/clientes.php';
    exit;
}

// Se não encontrar, mostra erro 404
http_response_code(404);
echo "Página não encontrada!";
