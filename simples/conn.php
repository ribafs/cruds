<?php
$host = '127.0.0.1';
$db   = 'cadastro';
$user = 'root';
$pass = 'root';

$opt = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass, $opt);
    // echo 'Conectado para o banco de dados<br />';

    //    $pdo = null;
}catch(PDOException $e){
    echo $e->getMessage();
}


