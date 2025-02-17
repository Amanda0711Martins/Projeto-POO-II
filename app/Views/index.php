<?php
namespace app\Views;
require_once __DIR__ . '/../Controllers/ProdutosController.php';
require_once __DIR__ . '/../Controllers/CategoriasController.php';

use app\Controllers\ProdutosController;
use app\Controllers\CategoriasController;

$produtosController = new ProdutosController();
$categoriasController = new CategoriasController();


$produtos = json_decode($produtosController->listarProdutos(),true);
$categorias = json_decode($categoriasController->listarCategorias(),true);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plataforma - Loja</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <!-- Sidebar de Categorias -->
        <nav class="col-md-3 col-lg-2 d-md-block bg-light sidebar">
            <div class="position-sticky pt-3">
                <h4 class="text-center">Categorias</h4>
                <ul class="nav flex-column">
                    <?php foreach ($categorias as $categoria): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="?categoria=<?= $categoria['id'] ?>">
                                <?= $categoria['nome'] ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </nav>

        <!-- Lista de Produtos -->
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <h2 class="mt-4">Produtos</h2>
            <div class="row">
                <?php if (!empty($produtos)): ?>
                    <?php foreach ($produtos as $produto): ?>
                        <div class="col-md-4 mb-4">
                            <div class="card">
                                <img src="<?= $produto['imagem'] ?>" class="card-img-top" alt="<?= $produto['nome'] ?>">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $produto['nome'] ?></h5>
                                    <p class="card-text">R$ <?= number_format($produto['preco'], 2, ',', '.') ?></p>
                                    <a href="produto.php?id=<?= $produto['id'] ?>" class="btn btn-primary">Ver Detalhes</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p class="text-center">Nenhum produto disponível.</p>
                <?php endif; ?>
            </div>
        </main>
    </div>
</div>

</body>
</html>