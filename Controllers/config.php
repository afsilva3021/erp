<?php

define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('BASE', 'ERP');

try {
    $conn = new MySQLi(HOST, USER, PASS, BASE);
} catch (Exception $e) {
   echo "Erro ao conectar com banco de dados", $e->getMessage();
}