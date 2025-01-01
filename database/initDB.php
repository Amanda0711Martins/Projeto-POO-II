<?php

$endereco = 'localhost';
$porta = '5432';
$banco = 'ClienteVendiTudo';
$usuario = 'postgres';
$senha = 'Minas@0202';

try {
  $pdo = new PDO("pgsql:host=$endereco;port=$porta;dbname=$banco", $usuario, $senha, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

} catch (PDOException $e) {
  echo "Falha ao conectar ao banco de dados. <br/>";
  die($e->getMessage());
}

?>