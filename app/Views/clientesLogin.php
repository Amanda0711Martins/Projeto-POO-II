<?php
namespace app\Views;
require_once __DIR__ . '/../Controllers/ClientesController.php';
use app\Controllers\ClientesController;

$controller = new ClientesController();
$clientes = json_decode(json_encode($controller->listarClientes()), true);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Clientes</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../../css/clientes.css" >
</head>
<body>
<body class="main-clientes">
<div class="container mt-5">
    <h2 class="mb-4">Lista de Clientes</h2>
    <table class="table table-striped">
        <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
        </tr>
        </thead>
        <tbody>
        <?php if (!empty($clientes)): ?>
            <?php foreach ($clientes as $cliente): ?>
                <tr>
                    <td><?= $cliente['id'] ?></td>
                    <td><?= $cliente['nome'] ?></td>
                    <td><?= $cliente['email'] ?></td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="3" class="text-center">Nenhum cliente encontrado</td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>
</div>
</body>
</html>
