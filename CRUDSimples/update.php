<?php
require_once 'connection.php';

$id = $_GET['id'];
//print $id;exit;
$stmt = $pdo->prepare("SELECT id,name,email FROM clients WHERE id=?");
$stmt->execute([$id]); 
$client = $stmt->fetch(PDO::FETCH_OBJ);
//print_r($client);exit;
$id = $client->id;
$name = $client->name;
$email = $client->email;
?>

<h2 align="center">Atualização de Cliente</h2>
 <hr style="width:23%"> 
<form method="POST" action="" autocomplete="on">
<table align="center">
<tr><td>Nome</td><td><input type="text" name="name" autocomplete="off" value="<?=$name?>"></td></tr>
<tr><td>E-mail</td><td><input type="text" name="email" value="<?=$email?>"></td></tr>
<input type="hidden" name="id" value="<?=$id?>">
<tr><td></td><td><input type="submit" value="Atualizar"></td></tr>
</table>

<?php

if(isset($_POST['name'])){
$id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];

$sql = "UPDATE clients SET name=?, email=? WHERE id=?";
$stmt= $pdo->prepare($sql);
$stmt->execute([$name, $email, $id]);

print "
<script>
location = \"index.php\";
</script>
";
}

?>

