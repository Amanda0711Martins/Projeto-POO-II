<?php
use app\Controllers\ClientesloginController;

$clienteController = new ClientesLoginController();

$method = $_SERVER['REQUEST_METHOD'];
$request_uri = $_SERVER['REQUEST_URI'];

// 🔹 Rota: Buscar o cliente logado
if ($method === 'GET' && $request_uri === '/api/clientes/me') {
    $clienteController->buscarClienteLogado();
    exit;
}

// 🔹 Rota: Login de cliente
if ($method === 'POST' && $request_uri === '/api/clientes/login') {
    $clienteController->loginCliente(); //talvez colocar a criação da session aqui session_start();
    exit;
}

// 🔹 Rota: Logout
if ($method === 'POST' && $request_uri === '/api/clientes/logout') {
    $clienteController->logoutCliente();
    exit;
}

// Se a rota não for encontrada
http_response_code(404);
echo json_encode(["erro" => "Rota não encontrada"]);
?>
