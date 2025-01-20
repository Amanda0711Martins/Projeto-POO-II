<?php
global $pdo;
require_once 'initDB.php';

$stmt = $pdo->prepare($sql);
