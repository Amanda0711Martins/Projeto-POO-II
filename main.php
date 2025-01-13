<?php
global $pdo;

require __DIR__ . '/Usuario.php';
require __DIR__ . '/cadastrarUsuario.php';

//require_once 'initDB.php';

echo "Olá, seja bem vindo ao VendiTudo\n\n";
echo "=============Menu=============\n";
echo "1 - Cadastrar novo Usuário\n";
echo "2 - Realizar Login\n";
echo "3 - Sair\n";

$opcao = readline();

switch($opcao){
    case "1":
        $usuario = new \model\Usuario();
        $usuario->capturarDados;
        break;

    /*case "2":
        $login->realizarLogin();
        break;*/
}