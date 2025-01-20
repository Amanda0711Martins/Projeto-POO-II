<?php

namespace controller;

use model\Login;
use PDO;
use PDOException;

class validarLogin
{
    private $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function validarLogin()
    {
        $email = Login::realizarLogin();
        $senha = Login::realizarLogin();
        $query = "SELECT * FROM usuario WHERE email = :email AND senha = :senha";

        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':senha', $senha);

        try {
            $stmt->execute();
            echo "Login realizado com sucesso!";
        } catch (PDOException $e) {
            echo "Erro ao realizar login, tente novamente: " . $e->getMessage();
        }
    }
}