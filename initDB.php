<?php
namespace database;
use PDO;
use PDOException;

$host = 'localhost';
$porta = '5432';
$banco = 'postgres';
$usuario = 'postgres';
$senha = 'Minas@0202';

try {
  $pdo = new PDO("pgsql:host=$host;port=$porta;dbname=$banco", 'postgres', 'Minas@0202', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

} catch (PDOException $e) {
  echo "Falha ao conectar ao banco de dados. <br/>";
  die($e->getMessage());
}

?>