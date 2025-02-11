<?php
namespace app\Models;
use Database\Database;
use PDO;
use PDOException;

require_once __DIR__ . '/../../Database/Database.php';

class Produto {
    private $database;

    public function __construct() {
        $db = new Database();
        $this->database = $db->getInstance();
    }

    public function getProdutos() {
        try {
            $statement = $this->database->prepare("SELECT * FROM produtos");
            $statement->execute();
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return [];
        }
    }
    public function cadastrarProduto($nome, $descricao, $preco, $estoque) {
        try {
            $statement = $this->database->prepare("INSERT INTO produtos (nome, descricao, preco, estoque) VALUES (?, ?, ?, ?)");
            return $statement->execute([$nome, $descricao, $preco, $estoque]);
        } catch (PDOException $e) {
            return false;
        }
    }

    public function getProdutoById($id) {
        try {
            $statement = $this->database->prepare("SELECT * FROM produtos WHERE id = ?");
            $statement->execute([$id]);
            return $statement->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return null;
        }
    }

    public function atualizarProduto($id, $nome, $descricao, $preco, $estoque) {
        try {
            $statement = $this->database->prepare("UPDATE produtos SET nome = ?, descricao = ?, preco = ?, estoque = ? WHERE id = ?");
            return $statement->execute([$nome, $descricao, $preco, $estoque, $id]);
        } catch (PDOException $e) {
            return false;
        }
    }

    public function excluirProduto($id) {
        try {
            $statement = $this->database->prepare("DELETE FROM produtos WHERE id = ?");
            return $statement->execute([$id]);
        } catch (PDOException $e) {
            return false;
        }
    }
}
?>
