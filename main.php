<?php
global $pdo;

require_once 'Models/CapturarDados.php';

use app\Models\CapturarDados;
use app\Models\Login;

//require_once 'Database.php';

echo "Olá, seja bem vindo ao VendiTudo\n\n";
echo "=============Menu=============\n";
echo "1 - Cadastrar novo Usuário\n";
echo "2 - Realizar Login\n";
echo "3 - Sair\n";
$usuario = [];
$opcao = readline();

switch($opcao){
    case "1":
        $usuario =  CapturarDados::capturarDados();
        break;

    case "2":
        $login = Login::realizarLogin();
        break;
}