<h2 align="center">Cadastro de Clientes</h2>

 <hr style="width:21%"> 

<form method="POST" action="" autocomplete="on">
<table align="center">
<tr><td>Nome</td><td><input type="text" name="name" autocomplete="off"></td></tr>
<tr><td>E-mail</td><td><input type="text" name="email"></td></tr>
<tr><td></td><td><input type="submit" value="Inserir"></td></tr>
</table>

<?php
require_once 'connection.php';

if(isset($_POST['name'])){
$name = $_POST['name'];
$email = $_POST['email'];

$sql = "INSERT INTO clients (name, email) VALUES (?,?)";
$pdo->prepare($sql)->execute([$name, $email]);

print "
<script>
location = \"index.php\";
</script>
";
}

?>

