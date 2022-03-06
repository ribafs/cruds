<h2 align="center">Cadastro de Clientes</h2>

<h3 align="center"><a href="insert.php">Novo Cliente</a></h3>
 <hr style="width:60%"> 
<table align="center">
<tr><td><b>Nome</b></td><td><b>E-mail</b></td><td><b>Ação</b></td></tr>

<?php
require_once 'connection.php';

$stmt = $pdo->query("SELECT * FROM clients order by id desc");

while ($row = $stmt->fetch()) {

    $id = $row['id'];
    $name = $row['name'];
    $email = $row['email'];
    ?>

    <tr><td><?=$name?></td><td><?=$email?></td><td><a href="update.php?id=<?=$id?>">Atualizar</a></td>
    <td><a href="delete.php?id=<?=$id?>" onclick="return confirm('Tem certeza de que deseja excluir este cliente ?')">Excluir</a></tr>

<?php
}
?>

</table>
