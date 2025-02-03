<?php

namespace controller;

use model\Login;
use PDO;
use PDOException;

class ValidarLogin
{
    private $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function validarLogin($email, $senha)
    {
        $query = "SELECT * FROM usuario WHERE email = :email";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':email', $email);

        try {
            $stmt->execute();
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($usuario && password_verify($senha, $usuario['senha'])) {
                echo "Login realizado com sucesso!";
                $_SESSION['usuario'] = $usuario['id'];
            } else {
                echo "Email ou senha incorretos.";
            }
        } catch (PDOException $e) {
            echo "Erro ao realizar login, tente novamente.";
        }
    }
}
