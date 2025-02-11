<?php
namespace app\Models;
use Database\Database;
use PDO;
use PDOException;

class ProdutoWeb {
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

    public function getProdutoById($id) {
        try {
            $statement = $this->database->prepare("SELECT * FROM produtos WHERE id = ?");
            $statement->execute([$id]);
            return $statement->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return null;
        }
    }
}
?>
