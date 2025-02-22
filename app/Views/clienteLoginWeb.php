<?php
namespace app\Views;
session_start();
require_once __DIR__ . '/../Controllers/ClientesLoginController.php';
use app\Controllers\ClientesLoginController;

if (!isset($_SESSION['cliente_id'])) {
    header("Location: login.php");
    exit;
}

$controller = new ClientesLoginController();
$cliente = json_decode(file_get_contents("http://localhost:8080/api/clientes/me"), true);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil do Cliente</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/clientes.css" >
</head>
<body>
<body class="main-clientes">
<div class="container mt-5">
    <h2 class="mb-4">Perfil do Cliente</h2>
    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <td><?= $cliente['id'] ?></td>
        </tr>
        <tr>
            <th>Nome</th>
            <td><?= $cliente['nome'] ?></td>
        </tr>
        <tr>
            <th>Email</th>
            <td><?= $cliente['email'] ?></td>
        </tr>
    </table>
    <a href="logout.php" class="btn btn-danger">Sair</a>
</div>
</body>
</html>
