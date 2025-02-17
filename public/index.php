<?php

$request_uri = $_SERVER['REQUEST_URI'];


if (strpos($request_uri, "/api/") === 0) {

    ob_start();
    // 🚀 Configuração para APIs
    header('Content-Type: application/json; charset=utf-8');
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
    header('Access-Control-Allow-Headers: Content-Type, Authorization');


    require_once __DIR__ . '/../routes/produto-api.php';
    require_once __DIR__ . '/../routes/categoria-api.php';

    require_once __DIR__ . '/../routes/usuario-api.php';
    require_once __DIR__ . '/../routes/cliente-api.php';
    //require_once __DIR__ . '/../routes/cliente-login-api.php';

    ob_end_clean();
    exit;

}

// Redireciona para a página estática caso seja um arquivo HTML, CSS ou JS
if (preg_match('/\.(?:css|js|png|jpg|jpeg|gif|ico|svg|woff|woff2|ttf|otf|eot)$/', $request_uri)) {
    return false;
}
require_once __DIR__ . '/../public/index.html';


http_response_code(404);
echo json_encode(["erro" => "Rota não encontrada"]);
?>
