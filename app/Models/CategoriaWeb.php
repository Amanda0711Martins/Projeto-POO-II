<?php
namespace app\Models;
use Database\Database;
use PDO;
use PDOException;

require_once __DIR__ . '/../../Database/Database.php';
class CategoriaWeb {
    private $database;

    public function __construct() {
        $db = new Database();
        $this->database = $db->getInstance();
    }

    public function getTodasCategorias() {
        try {
            $statement = $this->database->prepare("SELECT * FROM categorias");
            $statement->execute();
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return [];
        }
    }
}
?>
