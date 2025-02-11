<?php

use app\Controllers\UsuarioController;

require_once __DIR__ . '/../app/Controllers/UsuarioController.php';

$uri = explode('/', trim($_SERVER['REQUEST_URI'], '/'));
$method = $_SERVER['REQUEST_METHOD'];
$controller = new UsuarioController();

if ($uri[0] === 'usuarios') {
    if ($method === 'GET' && empty($uri[1])) {
        $controller->listarUsuarios();
    }
    else if ($method === 'GET' && isset($uri[1])) {
        $controller->buscarUsuario($uri[1]);
    }
    else if ($method === 'POST'){
        $controller->cadastrarUsuario();
    }
    else if ($method === 'PUT' && isset($uri[1])) {
        $controller->atualizarUsuario($uri[1]);
    }
    else if ($method === 'DELETE' && isset($uri[1])) {
        $controller->excluirUsuario($uri[1]);
    }else {
        echo json_encode(['error' => 'Rota Inválida'], 405);
    }

}