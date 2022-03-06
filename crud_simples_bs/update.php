<!DOCTYPE HTML>
<html lang="pt-br">
<head>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>PDO - Update a Record - PHP CRUD Tutorial</title>
     
    <!-- Latest compiled and minified Bootstrap CSS -->
    <link rel="stylesheet" href="libs/css/bootstrap.min.css" />
         
</head>
<body>
 
    <!-- container -->
    <div class="container">
  
        <div class="page-header">
            <h1>Update Cliente</h1>
        </div>
     
		<?php
		// get passed parameter value, in this case, the record ID
		// isset() is a PHP function used to verify if a value is there or not
		$id=isset($_GET['id']) ? $_GET['id'] : die('ERROR: Record ID not found.');
		 
		//include database connection
		include 'config/database.php';
		 
		// read current record's data
		try {
			// prepare select query
			$query = "SELECT id, nome, email, cpf, nascimento FROM clientes WHERE id = ? LIMIT 0,1";
			$stmt = $con->prepare( $query );
			 
			// this is the first question mark
			$stmt->bindParam(1, $id);
			 
			// execute our query
			$stmt->execute();
			 
			// store retrieved row to a variable
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			 
			// values to fill up our form
			$nome = $row['nome'];
			$email = $row['email'];
			$cpf = $row['cpf'];
			$nascimento = $row['nascimento'];
		}
		 
		// show error
		catch(PDOException $exception){
			die('ERROR: ' . $exception->getMessage());
		}
		?>
 
		<?php
		// get passed parameter value, in this case, the record ID
		// isset() is a PHP function used to verify if a value is there or not
		$id=isset($_GET['id']) ? $_GET['id'] : die('ERROR: Record ID not found.');
		 
		//include database connection
		include 'config/database.php';
		 
		// check if form was submitted
		if($_POST){
			 
			try{
			 
				// write update query
				// in this case, it seemed like we have so many fields to pass and 
				// it is better to label them and not use question marks
				$query = "UPDATE clientes 
				            SET nome=:nome, email=:email, cpf=:cpf, nascimento=:nascimento
				            WHERE id = :id";
		 
				// prepare query for excecution
				$stmt = $con->prepare($query);
		 
				// posted values
				$nome=htmlspecialchars(strip_tags($_POST['nome']));
				$email=htmlspecialchars(strip_tags($_POST['email']));
				$cpf=htmlspecialchars(strip_tags($_POST['cpf']));
				$nascimento=htmlspecialchars(strip_tags($_POST['nascimento']));
		 
				// bind the parameters
				$stmt->bindParam(':nome', $nome);
				$stmt->bindParam(':email', $email);
				$stmt->bindParam(':cpf', $cpf);
				$stmt->bindParam(':nascimento', $nascimento);
				$stmt->bindParam(':id', $id);
				 
				// Execute the query
				if($stmt->execute()){
				    echo "<div class='alert alert-success'>Record was updated.</div>";
				}else{
				    echo "<div class='alert alert-danger'>Unable to update record. Please try again.</div>";
				}
				 
			}
			 
			// show errors
			catch(PDOException $exception){
				die('ERROR: ' . $exception->getMessage());
			}
		}
		?>
 
		<!--we have our html form here where new record information can be updated-->
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?id={$id}");?>" method="post">
			<table class='table table-hover table-responsive table-bordered'>
				<tr>
				    <td>Nome</td>
				    <td><input type='text' name='nome' value="<?php echo htmlspecialchars($nome, ENT_QUOTES);  ?>" class='form-control' /></td>
				</tr>
				<tr>
				    <td>E-mail</td>
				    <td><input type='text' name='email' value="<?php echo htmlspecialchars($email, ENT_QUOTES);  ?>" class='form-control' /></td>
				</tr>
				<tr>
				    <td>CPF</td>
				    <td><input type='text' name='cpf' value="<?php echo htmlspecialchars($cpf, ENT_QUOTES);  ?>" class='form-control' /></td>
				</tr>
				<tr>
				    <td>Nascimento</td>
				    <td><input type='text' name='nascimento' value="<?php echo htmlspecialchars($nascimento, ENT_QUOTES);  ?>" class='form-control' /></td>
				</tr>
				<tr>
				    <td></td>
				    <td>
				        <input type='submit' value='Save Changes' class='btn btn-primary' />
				        <a href='index.php' class='btn btn-danger'>Back to read products</a>
				    </td>
				</tr>
			</table>
		</form>
         
    </div> <!-- end .container -->
     
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
   
<!-- Latest compiled and minified Bootstrap JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 
</body>
</html>
