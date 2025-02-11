<?php
namespace app\Models;

use app\Controllers\ValidarLogin;
use PDO;

class Login
{
    private $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function realizarLogin()
    {
        echo "Digite seu e-mail: \n";
        $email = trim(fgets(STDIN));
        echo "Digite sua senha: \n";
        $senha = trim(fgets(STDIN));

        $validador = new ValidarLogin($this->db);
        $validador->validarLogin($email, $senha);
    }
}
