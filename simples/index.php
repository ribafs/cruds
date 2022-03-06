<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Simples</title>
</head>
<body>

<h2 align="center">CRUD Simples usando apenas PHP com PDO</h2>

<div align="center">
<a href="add.php">Novo Cliente</a>
</div>
<br>

<?php
require_once 'conn.php';

    try{
        $stm = $pdo->query("SELECT * FROM clientes order by nome");
        $executa = $stm->execute();
        ?>

        <table border="2" align="center">
        <tr><td><b>ID</td><td><b>Nome</td><td><b>Email</td><td><b>Nascimento</td><td><b>CPF</td><td colspan="2" align="center">Ação</td></tr>

        <?php
            if($executa){
                while($reg = $stm->fetch(PDO::FETCH_OBJ)){ // Para recuperar um ARRAY utilize PDO::FETCH_ASSOC 
        ?>
                <tr><td><?=$reg->id?></td>
                <td><?=$reg->nome?></td>
                <td><?=$reg->email?></td>
                <td><?=$reg->data_nasc?></td>
                <td><?=$reg->cpf?></td>
                <td><a href="update.php?id=<?=$reg->id?>">Editar</a></td>
                <td><a href="delete.php?id=<?=$reg->id?>">Excluir</a></td></tr>
        <?php
           }
           print '</table>';
        }else{
               echo 'Erro ao inserir os dados';
        }
}catch(PDOException $e){
      echo $e->getMessage();
}
?>
</body>
</html>

