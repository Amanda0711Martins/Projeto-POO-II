<?php
use app\Controllers\ProdutosController;

require_once __DIR__ ."/../app/Controllers/ProdutosController.php";

$produtoController = new ProdutosController();

$method = $_SERVER['REQUEST_METHOD'];
$request_uri = $_SERVER['REQUEST_URI'];

// 🔹 Rota: Listar todos os produtos
if ($method === 'GET' && $request_uri === '/api/produtos') {
    $produtoController->listarProdutos();
    exit;
}

// 🔹 Rota: Buscar um produto pelo ID
if ($method === 'GET' && preg_match('/\/api\/produtos\/(\d+)/', $request_uri, $matches)) {
    $produtoController->buscarProduto($matches[1]);
    exit;
}

// 🔹 Rota: Criar um novo produto
if ($method === 'POST' && $request_uri === '/api/produtos') {
    $produtoController->cadastrarProduto();
    exit;
}

// 🔹 Rota: Atualizar um produto pelo ID
if ($method === 'PUT' && preg_match('/\/api\/produtos\/(\d+)/', $request_uri, $matches)) {
    $produtoController->atualizarProduto($matches[1]);
    exit;
}

// 🔹 Rota: Excluir um produto pelo ID
if ($method === 'DELETE' && preg_match('/\/api\/produtos\/(\d+)/', $request_uri, $matches)) {
    $produtoController->excluirProduto($matches[1]);
    exit;
}

// Se a rota não for encontrada
http_response_code(404);
echo json_encode(["erro" => "Rota não encontrada"]);
?>
