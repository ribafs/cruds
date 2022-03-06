<!DOCTYPE HTML>
<html>
<head>
    <title>PDO - Read One Record - PHP CRUD Tutorial</title>
 
    <!-- Latest compiled and minified Bootstrap CSS -->
    <link rel="stylesheet" href="libs/css/bootstrap.min.css" />
 
</head>
<body>
  
    <!-- container -->
    <div class="container">
  
        <div class="page-header">
            <h1>Read Cliente</h1>
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
 
		<!--we have our html table here where the record will be displayed-->
		<table class='table table-hover table-responsive table-bordered'>
			<tr>
				<td>Nome</td>
				<td><?php echo htmlspecialchars($nome, ENT_QUOTES);  ?></td>
			</tr>
			<tr>
				<td>E-mail</td>
				<td><?php echo htmlspecialchars($email, ENT_QUOTES);  ?></td>
			</tr>
			<tr>
				<td>CPF</td>
				<td><?php echo htmlspecialchars($cpf, ENT_QUOTES);  ?></td>
			</tr>
			<tr>
				<td>Nascimento</td>
				<td><?php echo htmlspecialchars($nascimento, ENT_QUOTES);  ?></td>
			</tr>
			<tr>
				<td></td>
				<td>
				    <a href='index.php' class='btn btn-danger'>Back to read products</a>
				</td>
			</tr>
		</table>
 
    </div> <!-- end .container -->
     
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
   
<!-- Latest compiled and minified Bootstrap JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 
</body>
</html>
