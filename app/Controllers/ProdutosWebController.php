<?php
namespace app\Controllers;
use app\Models\ProdutoWeb;
require_once __DIR__ . "/../Models/ProdutoWeb.php";
class ProdutosWebController {
    private $produtoModel;

    public function __construct() {
        $this->produtoModel = new ProdutoWeb();
    }

    public function listarProdutos() {
        if (isset($_GET['categoria'])) {
            return $this->produtoModel->getProdutosPorCategoria($_GET['categoria']);
        }
            return $this->produtoModel->getProdutos();

    }



    public function buscarProduto($id) {
        return $this->produtoModel->getProdutoById($id);
    }
}
?>
