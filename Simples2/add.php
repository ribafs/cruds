<?php require_once('./header.php'); ?>
</div>
</div>
<div class="row">
<div class="col-md-4"></div>
<div class="col-md-4">
    <form method="post" action="add.php">
        <table class="table table-striped table-sm table-bordered table-hover">
        <tr><td>Nome</td><td><input type="text" name="nome"></td></tr>
        <tr><td>Senha</td><td><input type="password" name="senha"></td></tr>
        <tr><td></td><td><input name="enviar" type="submit" value="Cadastrar"></td><tr>
        </table>
    </form>
</div>
</div>

<?php
require_once './footer.php';
require_once('./connect.php');

if(isset($_POST['enviar'])){
$nome = $_POST['nome'];
$senha = $_POST['senha'];

   try{
       $stmte = $pdo->prepare("INSERT INTO perfis (nome,senha) VALUES (?, ?)");
       $stmte->bindParam(1, $nome , PDO::PARAM_STR);
       $stmte->bindParam(2, $senha , PDO::PARAM_STR);
       $execute = $stmte->execute();
 
       if($execute){
           echo 'Dados inseridos com sucesso';
		   header('location: index.php');
       }
       else{
           echo 'Erro ao inserir os dados';
       }
   }
   catch(PDOException $e){
      echo $e->getMessage();
   }
}
?>

