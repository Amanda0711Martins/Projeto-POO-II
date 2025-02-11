<?php

namespace app\Models;
require_once __DIR__ . '/../../Database/Database.php';

use Database\Database;
use PDO;
use PDOException;

class Usuario
{
    private $database;

    public function __construct()
    {
        $db = new Database();
        $this->database = $db->getInstance();
    }

    public function getUsuarios(){
        try {
            $statement = $this->database->prepare("SELECT * FROM dadoscliente");
            $statement->execute();
            return $statement->fetchAll(PDO::FETCH_OBJ);
        }catch (PDOException $e){
            die(json_encode(["status"=>'error', "message" => $e->getMessage()]));
        }
    }

    public function getUsuario($id)
    {
        $statement = $this->database->getConnection()->prepare("SELECT * FROM dadoscliente WHERE id = :id");
        $statement->bindParam(":id", $id);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function createUsuario($nome, $email, $senha)
    {
        $statement = $this->database->getConnection()->prepare("INSERT INTO dadoscliente (nome, email, senha) VALUES (:nome, :email, :senha)");
        return $statement->execute([$nome, $email, $senha]);
    }

    public function updateUsuario($id, $nome, $email, $senha)
    {
        $statement = $this->database->getConnection()->prepare("UPDATE dadoscliente SET nome = :nome, email = :email, senha = :senha WHERE id = :id");
        return $statement->execute([$nome, $email, $senha, $id]);
    }

    public function deleteUsuario($id)
    {
        $statement = $this->database->getConnection()->prepare("DELETE FROM dadoscliente WHERE id = :id");
        $statement->bindParam(":id", $id);
        return $statement->execute();
    }

}