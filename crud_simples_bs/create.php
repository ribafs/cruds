<!DOCTYPE HTML>
<html>
<head>
    <title>PDO - Create a Record - PHP CRUD Tutorial</title>
     
    <!-- Latest compiled and minified Bootstrap CSS -->
    <link rel="stylesheet" href="libs/css/bootstrap.min.css" />
         
</head>
<body>
 
    <!-- container -->
    <div class="container">
  
        <div class="page-header">
            <h1>Create Product</h1>
        </div>
     
	<?php
	if($_POST){
	 
		// include database connection
		include 'config/database.php';
	 
		try{
		 
			// insert query
			$query = "INSERT INTO clientes
						SET nome=:nome, email=:email,
						    cpf=:cpf, nascimento=:nascimento";
			 
			// prepare query for execution
			$stmt = $con->prepare($query);
			 
			$nome=htmlspecialchars(strip_tags($_POST['nome']));
			$email=htmlspecialchars(strip_tags($_POST['email']));
			$cpf=htmlspecialchars(strip_tags($_POST['cpf']));
			$nascimento=htmlspecialchars(strip_tags($_POST['nascimento']));
			 
			// bind the parameters
			$stmt->bindParam(':nome', $nome);
			$stmt->bindParam(':email', $email);
			$stmt->bindParam(':cpf', $cpf);
			$stmt->bindParam(':nascimento', $nascimento);
			 		     
		}
		 
		// show error
		catch(PDOException $exception){
		    die('ERROR: ' . $exception->getMessage());
		}
	}
	?>
	 
	<!-- html form here where the product information will be entered -->
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
		<table class='table table-hover table-responsive table-bordered'>
		    <tr>
		        <td>Nome</td>
		        <td><input type='text' name='nome' class='form-control' /></td>
		    </tr>
		    <tr>
		        <td>E-mail</td>
		        <td><input type='text' name='email' class='form-control' /></td>
		    </tr>
		    <tr>
		        <td>CPF</td>
		        <td><input type='text' name='cpf' class='form-control' /></td>
		    </tr>
			<tr>
				<td>Nascimento</td>
				<td><input type="text" name="nascimento" /></td>
			</tr>
		    <tr>
		        <td></td>
		        <td>
		            <input type='submit' value='Save' class='btn btn-primary' />
		            <a href='index.php' class='btn btn-danger'>Back to read products</a>
		        </td>
		    </tr>
		</table>
	</form>
         
    </div> <!-- end .container -->
     
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="libs/js/jquery.min.js"></script>
  
<!-- Latest compiled and minified Bootstrap JavaScript -->
<script src="libs/js/bootstrap.min.js"></script>
 
</body>
</html>
