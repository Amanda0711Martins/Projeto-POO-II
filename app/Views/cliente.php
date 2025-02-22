<?php
namespace app\Views;
require_once __DIR__ . '/../Controllers/UsuarioController.php';
use app\Controllers\UsuarioController;

$controller = new UsuarioController();
$id = $_GET['id'] ?? null;
$cliente = json_decode(json_encode($controller->buscarUsuario($id)), true);

if (!$cliente) {
    echo "Cliente não encontrado!";
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do Cliente</title>    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/clientes.css" >
</head>
<body>
<body class="main-clientes">
<div class="container mt-5">
    <h2>Detalhes do Cliente</h2>
    <ul class="list-group">
        <li class="list-group-item"><strong>ID:</strong> <?= $cliente['id'] ?></li>
        <li class="list-group-item"><strong>Nome:</strong> <?= $cliente['nome'] ?></li>
        <li class="list-group-item"><strong>Email:</strong> <?= $cliente['email'] ?></li>
    </ul>
    <a href="clientes.php" class="btn btn-secondary mt-3">Voltar</a>
</div>
</body>
</html>
