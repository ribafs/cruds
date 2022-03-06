<?php
$hostname = "localhost";
$database = "testes";
$username = "root";
$password = "root";
$row_limit = 10;
$sgbd = 'mysql'; // mysql ou pgsql

// connect to mysql
try {
    $pdo = new PDO($sgbd.":host=$hostname;dbname=$database", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $err) {
    die("Error! " . $err->getMessage());
}
?>
