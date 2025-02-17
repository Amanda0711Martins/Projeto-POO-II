<?php
namespace app\Models;
use Database\Database;
use PDO;
use PDOException;

require_once __DIR__ . '/../../Database/Database.php';
class Categoria {
    private $database;

    public function __construct() {
        $db = new Database();
        $this->database = $db->getInstance();
    }

    public function getCategorias()
    {
        try {
            $statement = $this->database->prepare("SELECT * FROM categorias");
            $statement->execute();
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return [];
        }
    }

    public function getCategoriaById($id) {
        try {
            $statement = $this->database->prepare("SELECT * FROM categorias WHERE id = ?");
            $statement->execute([$id]);
            return $statement->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return null;
        }
    }

}
?>
