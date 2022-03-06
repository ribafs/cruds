<?php

try {
    $pdo = new PDO('mysql:host=localhost;dbname=pdo;port=3306', 'root', '');
//    print 'Conectou';
} catch (PDOException $e) {
    print "Erro: " . $e->getMessage() . "<br/>";
    die();
}

