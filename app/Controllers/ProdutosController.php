<?php
namespace app\Controllers;
use app\Models\Produto;

require_once __DIR__ . '/../Models/Produto.php';

class ProdutosController {
    private $produtoModel;

    public function __construct() {
        $this->produtoModel = new Produto();
    }

    public function listarProdutos()
    {
        if (isset($_GET['categoria'])) {
            echo json_encode($this->produtoModel->getProdutosPorCategoria($_GET['categoria']));
            exit;
        }
        echo json_encode($this->produtoModel->getProdutos());
        exit;

    }

     public function buscarProduto($id) {
        $produto = $this->produtoModel->getProdutoById($id);
        if ($produto) {
            echo json_encode($produto);
            exit;
        } else {
            http_response_code(404);
            echo json_encode(["erro" => "Produto não encontrado"]);
            exit;
        }
    }

    public function cadastrarProduto() {
        $data = json_decode(file_get_contents("php://input"), true);
        if (isset($data['nome'], $data['descricao'], $data['preco'], $data['estoque'])) {
            $success = $this->produtoModel->cadastrarProduto($data['nome'], $data['descricao'], $data['preco'], $data['estoque']);
            echo json_encode(["sucesso" => $success]);
            exit;
        } else {
            http_response_code(400);
            echo json_encode(["erro" => "Dados inválidos"]);
            exit;
        }
    }

    public function atualizarProduto($id) {
        $data = json_decode(file_get_contents("php://input"), true);
        if (isset($data['nome'], $data['descricao'], $data['preco'], $data['estoque'])) {
            $success = $this->produtoModel->atualizarProduto($id, $data['nome'], $data['descricao'], $data['preco'], $data['estoque']);
            echo json_encode(["sucesso" => $success]);
            exit;
        } else {
            http_response_code(400);
            echo json_encode(["erro" => "Dados inválidos"]);
            exit;
        }
    }

    public function excluirProduto($id) {
        $success = $this->produtoModel->excluirProduto($id);
        echo json_encode(["sucesso" => $success]);
        exit;
    }
}
?>
