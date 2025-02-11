<?php
namespace app\Controllers;
use app\Models\Produto;

require_once __DIR__ . '/../Models/Produto.php';

class ProdutosController {
    private $produtoModel;

    public function __construct() {
        $this->produtoModel = new Produto();
    }

    public function listarProdutos() {
        echo json_encode($this->produtoModel->getProdutos());
    }

    public function buscarProduto($id) {
        $produto = $this->produtoModel->getProdutoById($id);
        if ($produto) {
            echo json_encode($produto);
        } else {
            http_response_code(404);
            echo json_encode(["erro" => "Produto não encontrado"]);
        }
    }

    public function cadastrarProduto() {
        $data = json_decode(file_get_contents("php://input"), true);
        if (isset($data['nome'], $data['descricao'], $data['preco'], $data['estoque'])) {
            $success = $this->produtoModel->cadastrarProduto($data['nome'], $data['descricao'], $data['preco'], $data['estoque']);
            echo json_encode(["sucesso" => $success]);
        } else {
            http_response_code(400);
            echo json_encode(["erro" => "Dados inválidos"]);
        }
    }

    public function atualizarProduto($id) {
        $data = json_decode(file_get_contents("php://input"), true);
        if (isset($data['nome'], $data['descricao'], $data['preco'], $data['estoque'])) {
            $success = $this->produtoModel->atualizarProduto($id, $data['nome'], $data['descricao'], $data['preco'], $data['estoque']);
            echo json_encode(["sucesso" => $success]);
        } else {
            http_response_code(400);
            echo json_encode(["erro" => "Dados inválidos"]);
        }
    }

    public function excluirProduto($id) {
        $success = $this->produtoModel->excluirProduto($id);
        echo json_encode(["sucesso" => $success]);
    }
}
?>
