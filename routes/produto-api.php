<?php
use app\Controllers\ProdutosController;

require_once __DIR__ .'/../app/Controllers/ProdutosController.php';

$produtosController = new ProdutosController();


$method = $_SERVER['REQUEST_METHOD'];
$request_uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// 🔹 Rota: Listar todos os produtos
if ($method === 'GET' && preg_match('/^\/api\/produtos$/', $request_uri)) {
    $produtosController->listarProdutos();
    exit;
}

// 🔹 Rota: Buscar um produto pelo ID
if ($method === 'GET' && preg_match('/\/api\/produtos\/(\d+)/', $request_uri, $matches)) {
    $produtosController->buscarProduto($matches[1]);
    exit;
}

// 🔹 Rota: Criar um novo produto
if ($method === 'POST' && preg_match('/^\/api\/produtos$/', $request_uri)) {
    $produtosController->cadastrarProduto();
    exit;
}

// 🔹 Rota: Atualizar um produto pelo ID
if ($method === 'PUT' && preg_match('/\/api\/produtos\/(\d+)/', $request_uri, $matches)) {
    $produtosController->atualizarProduto($matches[1]);
    exit;
}

// 🔹 Rota: Excluir um produto pelo ID
if ($method === 'DELETE' && preg_match('/\/api\/produtos\/(\d+)/', $request_uri, $matches)) {
    $produtosController->excluirProduto($matches[1]);
    exit;
}
?>
