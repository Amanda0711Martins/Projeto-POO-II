<?php
namespace database;
use PDO;
use PDOException;

$endereco = 'localhost';
$porta = '5432';
$banco = 'postgres';
$usuario = 'postgres';
$senha = 'Minas@0202';


if (extension_loaded('pdo_pgsql')) {
    echo "A extensão pdo_pgsql está habilitada.";
} else {
    echo "A extensão pdo_pgsql NÃO está habilitada.";
}

if (extension_loaded('pgsql')) {
    echo "A extensão pgsql está habilitada.";
} else {
    echo "A extensão pgsql NÃO está habilitada.";
}


try {
  $pdo = new PDO("pgsql:host=$endereco;port=$porta;dbname=$banco", $usuario, $senha, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

} catch (PDOException $e) {
  echo "Falha ao conectar ao banco de dados. <br/>";
  die($e->getMessage());
}

?>