<?php require_once('./header.php'); ?>
<style>

</style>
<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <form method="post" action="">
                <table class="table table-bordered table-responsive table-hover">

<?php
require_once('./connect.php');

$id=$_GET['id'];

$sth = $pdo->prepare("SELECT id,nome,senha from perfis WHERE id = :id");
$sth->bindValue(':id', $id, PDO::PARAM_STR); // No select e no delete basta um bindValue
$sth->execute();

$reg = $sth->fetch(PDO::FETCH_OBJ);

$id = $reg->id;
$nome = $reg->nome;
$senha = $reg->senha;
?>
        <tr><td>Nome</td><td><input name="nome" type="text" value="<?=$nome?>"></td></tr>
        <tr><td>Senha</td><td><input name="senha" type="text" value="<?=$senha?>"></td></tr>
        <tr><td></td><td><input name="enviar" class="btn btn-primary" type="submit" value="Editar">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input name="id" type="hidden" value="<?=$id?>">
        <input name="enviar" class="btn btn-warning" type="button" onclick="location='index.php'" value="Voltar"></td></tr>
            </table>
        </form>
        </div>
    <div>
</div>
<?php

if(isset($_POST['enviar'])){
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $email = $_POST['senha'];

    $data = [
        'nome' => $nome,
        'senha' => $senha,
        'id' => $id,
    ];

    $sql = "UPDATE perfis SET nome=:nome, senha=:senha WHERE id=:id";
    $stmt= $pdo->prepare($sql);

   if($stmt->execute($data)){
        print "<script>alert('Registro alterado com sucesso!');location='index.php';</script>";
    }else{
        print "Erro ao editar o registro!<br><br>";
    }
}
require_once('./footer.php');
?>

