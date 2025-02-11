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

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $dadosAtualizados = [
        'nome' => $_POST['nome'],
        'email' => $_POST['email']
    ];
    $controller->atualizarUsuario($id);
    header("Location: clientes.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Cliente</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Editar Cliente</h2>
    <form method="POST">
        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input type="text" class="form-control" id="name" name="nome" value="<?= htmlspecialchars($cliente['nome']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" class="form-control" id="email" name="email" value="<?= htmlspecialchars($cliente['email']) ?>" required>
        </div>
        <button type="submit" class="btn btn-success">Salvar</button>
        <a href="clientes.php" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
</body>
</html>
