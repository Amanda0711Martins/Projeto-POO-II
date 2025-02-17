<?php

use app\controllers\CategoriasController;

require_once __DIR__ .'/../app/Controllers/CategoriasController.php';

$categoriasController = new CategoriasController();

$method = $_SERVER['REQUEST_METHOD'];
$request_uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// 🔹 Rota: Listar todos as categorias
if ($method === 'GET' && preg_match('/^\/api\/categorias$/', $request_uri)) {
    $categoriasController->listarCategorias();
    exit;
}

// 🔹 Rota: Buscar uma categoria pelo ID
if ($method === 'GET' && preg_match('/\/api\/categorias\/(\d+)/', $request_uri, $matches)) {
    $categoriasController->buscarCategoria($matches[1]);
    exit;
}
// Se a rota não for encontrada

?>
