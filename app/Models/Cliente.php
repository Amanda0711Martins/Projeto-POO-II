<?php
namespace app\Models;
use Database\Database;
use PDO;
use PDOException;
require_once __DIR__ . '/../../Database/Database.php';
class Cliente {
    private $database;

    public function __construct() {
        $db = new Database();
        $this->database = $db->getInstance();
    }

    public function getClientes(): array
    {
        try {
            $statement = $this->database->prepare("SELECT * FROM dadoscliente");
            $statement->execute();
            return $statement->fetchAll(PDO::FETCH_ASSOC); // 🔹 Retorna array associativo
        } catch (PDOException $e) {
            return []; // 🔹 Evita erro se o banco falhar
        }
    }
}
?>
