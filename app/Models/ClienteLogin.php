<?php
namespace app\Models;
use Database\Database;
use PDO;
use PDOException;

class ClienteLogin {
    private $database;

    public function __construct() {
        $db = new Database();
        $this->database = $db->getInstance();
    }

    public function getClienteById($id) {
        try {
            $statement = $this->database->prepare("SELECT id, nome, email FROM clientes WHERE id = ?");
            $statement->execute([$id]);
            return $statement->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return null;
        }
    }

    public function criarCliente($nome, $email, $senha) {
        try {
            $senhaHash = password_hash($senha, PASSWORD_DEFAULT);
            $statement = $this->database->prepare("INSERT INTO clientes (nome, email, senha) VALUES (?, ?, ?)");
            return $statement->execute([$nome, $email, $senhaHash]);
        } catch (PDOException $e) {
            return false;
        }
    }

    public function verificarSenha($email, $senha) {
        try {
            $statement = $this->database->prepare("SELECT id, nome, senha FROM clientes WHERE email = ?");
            $statement->execute([$email]);
            $cliente = $statement->fetch(PDO::FETCH_ASSOC);

            if ($cliente && password_verify($senha, $cliente['senha'])) {
                return ["id" => $cliente['id'], "nome" => $cliente['nome']];
            } else {
                return null;
            }
        } catch (PDOException $e) {
            return null;
        }
    }
}
?>
