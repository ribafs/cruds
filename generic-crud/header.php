<?php
include_once("classes/Crud.php");
$crud = new Crud($pdo,'clientes');

$stmt = $crud->pdo->prepare("SELECT COUNT(*) AS id FROM clientes");
$stmt->execute();
$rows = $stmt->fetch(PDO::FETCH_ASSOC);

// get total no. of pages
$totalPages = ceil($rows['id']/$crud->regsPerPage);
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <title>CRUD</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/style.css" rel="stylesheet" type="text/css" />
    <style type="text/css">
    .panel-footer {
        padding: 0;
        background: none;
    }
    </style>
</head>
