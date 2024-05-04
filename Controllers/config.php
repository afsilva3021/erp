<?php

define('HOST', 'localhost');
define('USER', 'erp');
define('PASS', 'ERP_php@5533');
define('BASE', 'ERP');

try {
    $conn = new MySQLi(HOST, USER, PASS, BASE);
} catch (Exception $e) {
   echo "Erro ao conectar com banco de dados", $e->getMessage();
}


$dsn = "mysql:host=".HOST.";dbname=".BASE;

try {
    $pdo = new PDO($dsn, USER, PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro de conexão: " . $e->getMessage());
}



// DILMA
// 