<?php
include_once("./connect.php");

$results = $pdo->prepare("SELECT id,nome,senha FROM perfis ORDER BY id");
$results->execute();
$rel = '';

while($row = $results->fetch(PDO::FETCH_ASSOC)) {
    $rel .= $row['id'] . "\n";
    $rel .= $row['nome'] . "\n";
    $rel .= $row['senha'] . "\n\n";
}

$fp = fopen("relatorio.txt", "w");
fwrite($fp, $rel);
fclose($fp);

print 'Arquivo relatorio.txt criado';
