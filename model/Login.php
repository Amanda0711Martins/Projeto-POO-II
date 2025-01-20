<?php
namespace model;
use controller\validarLogin;

class Login
{
    public static function realizarLogin(): array
    {
        echo "Digite seu e-mail: \n";
        $email = readline();
        echo "Digite a senha: \n";
        $senha = readline();
        return [$email, $senha];
        (new validarLogin)->validarLogin();
    }
}