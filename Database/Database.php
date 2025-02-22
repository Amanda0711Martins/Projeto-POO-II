<?php
namespace Database;
use PDO;
use PDOException;
class Database{
    private static $instance = null;
    private $pdo;
    private $host = 'localhost';
    private $porta = '5432';
    private $banco = 'postgres';
    private $usuario = 'postgres';
    private $senha = 'Minas@0202';


public function __construct()
{
    try {
        $this->pdo = new PDO("pgsql:host={$this->host};dbname={$this->banco};port={$this->porta}", $this->usuario , $this->senha,
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
             PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]);

    } catch (PDOException $e) {
        die("Erro na conexão: " . $e->getMessage());
    }
}
public static function getInstance(){
    if(self::$instance === null){
        self::$instance = new self();
    }
    return self::$instance->pdo;
}

}
?>