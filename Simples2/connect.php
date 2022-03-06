<?php
$hostname = "localhost";
$username = "root";
$password = "";
$database = "testes";
$row_limit = 7;

// connect to mysql
try {
    $pdo = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $err) {
//    die("Error! " . $err->getMessage());
print $err->getCode();exit;
    if($err->getCode() == '42000') print 'OK';exit;
}
